<?php

namespace App\Http\Controllers;

use App\Models\PeliculaAlquilada;
use Illuminate\Http\Request;

class PeliculaAlquiladaController extends Controller
{
    public function __construct()
    {
        // En caso de entrar a alquilar una película y no estar logeado. 
        // Te redirige al login, inicias sesión y vuelve a la vista de alquiler
        $this->middleware('auth');
    }

    /**
    * Sólo creo los métodos para visualizar las películas alquiladas. Para añadirla y 
    * para borrarla
    */ 
    public function index()
    {
        $peliculasAlquiladas = PeliculaAlquilada::all();

        return view('peliculas-alquiladas/index', compact('peliculasAlquiladas'));
    }

    public function create()
    {
        return view('peliculas-alquiladas/create');
    }
    public function store($id)
    {
        //
    }

    // Proceso para devolver la película
    public function edit($id)
    {
        // Muestro un formulario de confirmación (Controlar que el usuario la tenga alquilada)
        return view('peliculas-alquiladas/edit', compact('id'));
    }
    public function update($id)
    {
        // Cambio el valor del booleano devuelto a true
    }
}
