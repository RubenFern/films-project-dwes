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

    public function index()
    {
        return view('peliculas-alquiladas/index');
    }
}
