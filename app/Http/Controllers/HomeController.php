<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\PeliculaAlquilada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Si es admin su home es el panel de control
        $usuario = Auth::User();

        if ($usuario->id == 1)
        {
            return redirect()->route('admin.index');
        } else
        {
            // Retorno 5 películas aleatorias
            $sugerenciaDePeliculas = Pelicula::inRandomOrder()->limit(5)->get();
            // Cuento el número de películas alquiladas que tiene el usuario
            $numPeliculasAlquiladas = PeliculaAlquilada::where('id_user', $usuario->id)->where('devuelta', 0)->count();

            return view('home', compact('sugerenciaDePeliculas', 'numPeliculasAlquiladas'));
        }

        
    }
}
