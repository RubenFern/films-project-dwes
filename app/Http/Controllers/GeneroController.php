<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();

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
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    public function update(Genero $genero)
    {
        $genero->update(request()->all());
    }

    public function destroy(Genero $genero)
    {        
        $genero->delete();
    }
}
