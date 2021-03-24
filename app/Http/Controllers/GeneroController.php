<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        return view('generos/index');
    }
    public function show($id)
    {
        return view('generos/show', compact('id'));
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
