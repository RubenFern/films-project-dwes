@extends('layouts.app')

@section('content')

    <h1>Añade un género para las películas</h1>

    <form method="POST" action="{{ route('generos.store') }}">
        @csrf

        <br>
        <label for="genero">Nombre del género</label>
        <input type="text" name="genero" required>

        <br><br>

        <input type="submit" name="añadir" value="Añade el género">
    </form>
        
@endsection
