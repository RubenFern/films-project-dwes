<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Muestro todas las películas de la base de datos
    public function index()
    {
        $peliculas = Pelicula::all();

        return view('peliculas.index', compact('peliculas'));
    }
    // Muestro sólo la película que coincida con el id solicitado
    public function show($id)
    {
        // Con findOrFail si no existe el id visualiza un error 404 
        $pelicula = Pelicula::findOrFail($id);

        return view('peliculas.show', compact('pelicula'));
    }

    // Retono la vista del formulario para añadir una película
    public function create()
    {
        // Llamo a todos los generos para listarlos en el select
        $generos = Genero::all();

        return view('peliculas.create', compact('generos')); 
    }
    // La acción del formulario de añadir película redirige a este 
    // método para guardar los datos en la base de datos
    public function store()
    {
        // Valido los datos
        $rules = [
            "id_genero" => "required",
            "titulo" => "required|unique:peliculas",
            "director" => "required",
            "año" => "required",
            "precio" => "required|min:2|max:30",
            "sinopsis" => "required",
            "cantidad" => "required|min:1",
            "imagen" => "required"
        ];

        request()->validate($rules);

        Pelicula::create(request()->all()); 
    }

    // Muestro el formulario para editar una película en específico
    public function edit($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $generos = Genero::all();

        return view('peliculas.edit', compact('pelicula', 'generos'));
    }
    // La acción del formulario de editar me redirige a este método para 
    // actualizar los datos en la base de datos
    public function update($id)
    {
        // Valido los datos
        $rules = [
            "id_genero" => "required",
            "titulo" => "required|unique:peliculas",
            "director" => "required",
            "año" => "required",
            "precio" => "required|min:2|max:30",
            "sinopsis" => "required",
            "cantidad" => "required|min:1",
            "imagen" => "required"
        ];

        request()->validate($rules);

        $pelicula = Pelicula::findOrFail($id);

        $pelicula->update(request()->all());
    }

    // Elimino la película con el id marcado
    public function destroy($id)
    {
        /**
         * Al volver a buscar la película con el id me aseguro que si el admin recarga la página 
         * para borrar 2 veces la misma película le de un error 404 porque no la encontraría
         */
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->delete();
    }
}
