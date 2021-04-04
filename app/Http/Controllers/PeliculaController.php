<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeliculaRequest;
use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\PeliculaAlquilada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    public function __construct()
    {
        // Todos los métodos excpeto index
        //$this->middleware('admin')->except('index');
    }

    public function index()
    {
        $peliculas = Pelicula::all();

        return view('peliculas.index', compact('peliculas'));
    }

    public function show(Pelicula $pelicula)
    {
        if (Auth::user())
        {
            $alquilada = PeliculaAlquilada::where('id_user', Auth::user()->id)
                                            ->where('id_pelicula', $pelicula->id)
                                            ->where('devuelta', 0)->first();

            return view('peliculas.show', compact('pelicula', 'alquilada'));
        } else
        {
            return view('peliculas.show', compact('pelicula'));
        }
        
    }

    public function create()
    {
        // Llamo a todos los generos para listarlos en el select
        $generos = Genero::all();

        return view('peliculas.create', compact('generos')); 
    }

    public function store(PeliculaRequest $request)
    {
        return DB::transaction(function () use ($request) {
            Pelicula::create([
                'id_genero' => $request->id_genero,
                'titulo' => $request->titulo,
                'director' => $request->director,
                'año' => $request->año,
                'precio' => $request->precio,
                'sinopsis' => $request->sinopsis,
                'cantidad' => $request->cantidad,
                'imagen' => $request->imagen->store('peliculas', 'images')
            ]);

            // Retorno la vista de todas las películas y un mensaje
            return redirect()
                        ->route('peliculas.index')
                        ->withSuccess('Se ha añadido la película correctamente');
        }, 3);
    }

    public function edit(Pelicula $pelicula)
    {
        $generos = Genero::all();

        return view('peliculas.edit', compact('pelicula', 'generos'));
    }

    public function update(PeliculaRequest $request, Pelicula $pelicula)
    {    
        $pelicula->update([
            'id_genero' => $request->id_genero,
            'titulo' => $request->titulo,
            'director' => $request->director,
            'año' => $request->año,
            'precio' => $request->precio,
            'sinopsis' => $request->sinopsis,
            'cantidad' => $request->cantidad,
            'imagen' => $request->imagen->store('peliculas', 'images')
        ]);

        return redirect()
                    ->route('peliculas.show', ['pelicula' => $pelicula->id])
                    ->withSuccess('Se han actualizado los datos de la película: ' . $pelicula->titulo);
    }

    // Elimino la película con el id marcado
    public function destroy(Pelicula $pelicula)
    {
        // Si la película que se borre la tiene alquilaa un usuario retorno un error
        $borradoValido = PeliculaAlquilada::where('id_pelicula', $pelicula->id)->where('devuelta', 0)->count();

        if ($borradoValido != 0)
        {
            return redirect()
                        ->route('admin.index')
                        ->withErrors('No se puede eliminar la película, un usuario la tiene alquilada');
        } else
        {
            $pelicula->delete();

            // Retorno la vista de todas las películas y un mensaje
            return redirect()
                        ->route('admin.index')
                        ->withSuccess('Se ha eliminado la película: ' . $pelicula->titulo);
        }        
    }
}
