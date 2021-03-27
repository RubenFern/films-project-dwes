@extends('layouts.app')

@section('content')

    <h1>Introduce los datos de la película</h1>

    <form method="POST" action="{{ route('peliculas.store') }}">
        @csrf

        <br>

        <label for="titulo">Título: </label>
        <input class="text-black" type="text" name="titulo" value="{{ old('titulo') }}">

        <br><br>

        <label for="genero">Género: </label>
        <select class="text-black" name="id_genero" >
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" {{ old('id_genero') == $genero->id ? 'selected' : '' }}>{{ $genero->genero }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="sinopsis">Sinopsis: </label><br>
        <textarea class="text-black" name="sinopsis" cols="30" rows="10">{{ old('sinopsis') }}</textarea>

        <br><br>

        <label for="director">Director: </label>
        <input class="text-black" type="text" name="director" value="{{ old('director') }}">

        <br><br>

        <label for="cantidad">Cantidad</label>
        <input class="text-black" type="number" name="cantidad" value="{{ old('cantidad') }}">

        <br><br>

        <label for="precio">Precio: </label>
        <input class="text-black" type="number" name="precio" step="0.01" value="{{ old('precio') }}">
        <p class="text-sm text-gray-500">EL precio de estar entre 2.99€ y 49.99€</p>

        <br><br>

        <label for="año">Año: </label>
        <input class="text-black" type="text" name="año" value="{{ old('año') }}">

        <br><br>

        <label for="imagen">Imagen: </label>
        <input class="text-black" type="file" name="imagen">

        <br><br>

        <input class="text-black" type="submit" name="añadir" value="Añadir película">
    </form>

@endsection