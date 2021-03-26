<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();

        return view('generos.index', compact('generos'));
    }
    public function show($id)
    {
        $genero = Genero::findOrFail($id);

        return view('generos.show', compact('genero'));
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

    public function edit($id)
    {
        $genero = Genero::findOrFail($id);

        return view('generos.edit', compact('genero'));
    }
    public function update($id)
    {
        $genero = Genero::findOrFail($id);

        $genero->update(request()->all());
    }

    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);
        
        $genero->delete();
    }
}
