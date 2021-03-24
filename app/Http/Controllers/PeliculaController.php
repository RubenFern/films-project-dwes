<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Muestro todas las películas de la base de datos
    public function index()
    {
        return view('peliculas/index');
    }
    // Muestro sólo la película que coincida con el id solicitado
    public function show($id)
    {
        return view('peliculas/show', compact('id'));
    }

    // Retono la vista del formulario para añadir una película
    public function create()
    {
        return view('peliculas/create');
    }
    // La acción del formulario de añadir película redirige a este 
    // método para guardar los datos en la base de datos
    public function store($id)
    {
        //
    }

    // Muestro el formulario para editar una película en específico
    public function edit($id)
    {
        return view('peliculas/edit', compact('id'));
    }
    // La acción del formulario de editar me redirige a este método para 
    // actualizar los datos en la base de datos
    public function update($id)
    {
        //
    }

    // Elimino la película con el id marcado
    public function destroy($id)
    {
        //
    }
}
