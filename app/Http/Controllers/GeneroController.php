<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();

        return view('generos/index', compact('generos'));
    }
    public function show($id)
    {
        $genero = Genero::findOrFail($id);

        return view('generos/show', compact('genero'));
    }

    public function create()
    {
        return view('generos/create');
    }
    public function store($id)
    {
        //
    }

    public function edit($id)
    {
        return view('generos/edit', compact('id'));
    }
    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
