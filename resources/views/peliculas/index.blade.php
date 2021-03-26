@extends('layouts.app')

@section('content')

    <h2>Muestro todas las películas</h2>

    <table border="1">
        <tr>
            <th>Título</th> <th>Sinopsis</th> <th>Director</th> <th>Año</th> <th>imagen</th>
        </tr>
        @foreach ($peliculas as $pelicula)
            <tr>
                <td>
                    <a href="{{ route('peliculas.show', ['pelicula' => $pelicula->id]) }}">
                        {{ $pelicula->titulo }}
                    </a>
                </td> 
                <td>{{ $pelicula->sinopsis }}</td> 
                <td>{{ $pelicula->director }}</td> 
                <td>{{ $pelicula->año }}</td> 
                <td><img width="50" src="{{ $pelicula->imagen }}" ></td>
            </tr>
        @endforeach
    </table>
@endsection