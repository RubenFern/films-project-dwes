<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeliculaRequest;
use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;

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
        return view('peliculas.show', compact('pelicula'));
    }

    public function create()
    {
        // Llamo a todos los generos para listarlos en el select
        $generos = Genero::all();

        return view('peliculas.create', compact('generos')); 
    }

    public function store(PeliculaRequest $request)
    {
        // El request me tiene solo los datos que han sido validados del formulario
        Pelicula::create($request->validated()); 

        // Retorno la vista de todas las películas y un mensaje
        return redirect()
                    ->route('peliculas.index')
                    ->withSuccess('Se ha añadido la película correctamente');
    }

    public function edit(Pelicula $pelicula)
    {
        $generos = Genero::all();

        return view('peliculas.edit', compact('pelicula', 'generos'));
    }

    public function update(PeliculaRequest $request, Pelicula $pelicula)
    {
        // Actualizo los datos de la película en específico
        $pelicula->update($request->validated());

        return redirect()
                    ->route('peliculas.show', ['pelicula' => $pelicula->id])
                    ->withSuccess('Se han actualizado los datos de la película: ' . $pelicula->titulo);
    }

    // Elimino la película con el id marcado
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();

        // Retorno la vista de todas las películas y un mensaje
        return redirect()
                    ->route('peliculas.index')
                    ->withSuccess('Se ha eliminado la película: ' . $pelicula->titulo);
    }
}
