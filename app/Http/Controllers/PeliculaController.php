<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Muestro todas las películas de la base de datos
    public function index()
    {
        return "Muestro todas las películas";
        //return view('home');
    }
    // Muestro sólo la película que coincida con el id solicitado
    public function show($id)
    {
        return "Muestro la película con el $id";
        //return view('home');
    }

    // Retono la vista del formulario para añadir una película
    public function create()
    {
        return "Muestro el formulario para añadir una peli";
        //return view('home');
    }
    // La acción del formulario de añadir película redirige a este 
    // método para guardar los datos en la base de datos
    public function store($id)
    {
        // retornaría la vista get por defecto 
        //
    }

    // Muestro el formulario para editar una película en específico
    public function edit($id)
    {
        return "Muestro el form para editar una película con el id $id"; 
        //return view('home');
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
