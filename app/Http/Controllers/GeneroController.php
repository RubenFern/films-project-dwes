<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\PeliculaAlquilada;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = array();
        $nombreGeneros = Genero::all();

        // Guardo en un array los géneros y el número de películas que contiene
        foreach ($nombreGeneros as $genero)
        {
            $numeroPeliculas = Pelicula::where('id_genero', $genero->id)->count();

            $array = array (
                "id" => $genero->id,
                "nombre" => $genero->genero,
                "numPeliculas" => $numeroPeliculas
            );

            array_push($generos, $array);
        }

        return view('generos.index', compact('generos'));
    }

    public function show(Genero $genero)
    {
        $peliculasFiltradas = Pelicula::where('id_genero', $genero->id)->get();

        return view('generos.show', compact('peliculasFiltradas', 'genero'));
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store()
    {
        /**
         * Llamo a todos los campos del formulario, pero sólo se guardan los campos
         * que especifiqué en el array $filleable del modelo
         */
        Genero::create(request()->all());

        return redirect()
                    ->route('admin.index')
                    ->withSuccess('Se ha añadido el género correctamente');
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    public function update(Genero $genero)
    {
        $genero->update(request()->all());

        return redirect()
                    ->route('admin.index')
                    ->withSuccess('Se ha actualizado el género correctamente');
    }

    public function destroy(Genero $genero)
    {   
        // No se puede eliminar un género si un usuario tiene alquilada una película de ese género
        $peliculas = Pelicula::where('id_genero', $genero->id)->get();
        $borradoValido = true;
        
        // En el momento que exista una consulta con más de 0 significa que un usuario tiene una película alquilada de este género
        foreach ($peliculas as $pelicula)
        {
            $peliculaAlquilada = PeliculaAlquilada::where('id_pelicula', $pelicula->id)->where('devuelta', 0)->count();

            if ($peliculaAlquilada != 0)
            {
                $borradoValido = false;
            }
        }

        if ($borradoValido)
        {
            $genero->delete();

            return redirect()
                        ->route('admin.index')
                        ->withSuccess('Se ha eliminado el género de ' . $genero->genero);
        } else
        {
            return redirect()
                        ->route('admin.index')
                        ->withErrors('No se puede eliminar porque existen películas alquiladas por usuarios de este género');
        }
        
    }
}
