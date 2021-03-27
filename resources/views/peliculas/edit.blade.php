@extends('layouts.app')

@section('content')

    <h1>Edita la información de la película</h1>

    <form method="POST" action="{{ route('peliculas.update', ['pelicula' => $pelicula->id]) }}">
        @csrf
        @method('PUT')
        <br>

        <label for="titulo">Título: </label>
        <input class="text-black" type="text" name="titulo" value="{{ old('titulo') ?? $pelicula->titulo }}"> 
        {{-- La doble interrogación comrpueba si alguno de los 2 está definido, da prioridad al old() --}}

        <br><br>

        <label for="genero">Género: </label>
        <select class="text-black" name="id_genero">
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" {{ old('id_genero') == $pelicula->id_genero ? 'selected' : ($genero->id == $pelicula->id_genero ? 'selected' : '') }}>{{ $genero->genero }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="sinopsis">Sinposis: </label><br>
        <textarea class="text-black" name="sinopsis" cols="30" rows="10">{{ old('sinopsis') ?? $pelicula->sinopsis }}</textarea>

        <br><br>

        <label for="director">Director: </label>
        <input class="text-black" type="text" name="director" value="{{ old('director') ?? $pelicula->director }}">

        <br><br>

        <label for="cantidad">Cantidad</label>
        <input class="text-black" type="number" name="cantidad" min="0" value="{{ old('cantidad') ?? $pelicula->cantidad }}">

        <br><br>

        <label for="precio">Precio: </label>
        <input class="text-black" type="number" name="precio" value="{{ old('precio') ?? $pelicula->precio }}" step="0.01">

        <br><br>

        <label for="año">Año: </label>
        <input class="text-black" type="text" name="año" value="{{ old('año') ?? $pelicula->año }}">

        <br><br>

        <label for="imagen">Imagen: </label>
        <input class="text-black" type="file" name="imagen">

        <br><br>

        <input class="text-black" type="submit" name="añadir" value="Editar película">

    </form>
    
@endsection