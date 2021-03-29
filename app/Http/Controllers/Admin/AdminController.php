<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        $generos = Genero::all();

        return view('admin', compact('peliculas', 'generos'));
    }
}
