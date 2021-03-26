@extends('layouts.app')

@section('content')

    <h1>Edita el nombre de un género</h1>

    <form method="POST" action="{{ route('generos.update', ['genero' => $genero->id]) }}">
        @csrf
        @method('PUT')

        <br>
        <label for="genero">Nombre del género</label>
        <input type="text" name="genero" value="{{ $genero->genero }}" required>

        <br><br>

        <input type="submit" name="editar" value="Editar género">

    </form>

@endsection