<?php

namespace App\Http\Controllers;

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
        return view('peliculas-alquiladas/index');
    }
    
    public function create()
    {
        return view('peliculas-alquiladas/create');
    }
    public function store($id)
    {
        //
    }

    // Cambiar booleano de la devolución (NO BORRAR REGISTRO)
    public function destroy($id)
    {
        //
    }
}
