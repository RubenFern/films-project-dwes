<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retorno 5 películas aleatorias
        $sugerenciaDePeliculas = Pelicula::inRandomOrder()->limit(5)->get();

        return view('home', compact('sugerenciaDePeliculas'));
    }
}
