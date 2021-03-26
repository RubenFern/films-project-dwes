@extends('layouts.app')

@section('content')

    <h1>Edita la información de la película</h1>

    <form method="POST" action="{{ route('peliculas.update', ['pelicula' => $pelicula->id]) }}">
        @csrf
        @method('PUT')
        <br>

        <label for="titulo">Título: </label>
        <input type="text" name="titulo" value="{{ $pelicula->titulo }}" required>

        <br><br>

        <label for="genero">Género: </label>
        <select name="id_genero" required>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" {{ $genero->id == $pelicula->id_genero ? 'selected' : '' }}>{{ $genero->genero }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="sinopsis">Sinposis: </label><br>
        <textarea name="sinopsis" cols="30" rows="10" required>{{ $pelicula->sinopsis }}</textarea>

        <br><br>

        <label for="director">Director: </label>
        <input type="text" name="director" value="{{ $pelicula->director }}" required>

        <br><br>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" min="0" value="{{ $pelicula->cantidad }}" required>

        <br><br>

        <label for="precio">Precio: </label>
        <input type="number" name="precio" value="{{ $pelicula->precio }}" min="2.99" step="0.01" max="29.99" required>

        <br><br>

        <label for="año">Año: </label>
        <input type="text" name="año" value="{{ $pelicula->año }}" pattern="^(19|20)\d{2}$" required>

        <br><br>

        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" value="{{ $pelicula->imagen }}" required>

        <br><br>

        <input type="submit" name="añadir" value="Editar película">

    </form>
    
@endsection