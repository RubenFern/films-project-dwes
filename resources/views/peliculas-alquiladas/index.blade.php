@extends('layouts.app')

@section('content')
        
    @empty ($peliculasAlquiladas)
        <h2>No tienes ninguna película alquilada</h2>

        <p><a href="{{ route('peliculas.index') }}">Echa un vistazo a nuestras películas</a></p>
    @else
        <tr>
            <th>Título</th> <th>Sinopsis</th> <th>Director</th> <th>Año</th> <th>imagen</th>
        </tr>
        @foreach ($peliculasAlquiladas as $peliculaAlquilada)
            <tr>
                <td>
                    <a href="{{ route('peliculas.show', ['pelicula' => $peliculaAlquilada->pelicula->id]) }}">
                        {{ $peliculaAlquilada->pelicula->titulo }}
                    </a>
                </td> 
                <td>{{ $peliculaAlquilada->pelicula->sinopsis }}</td> 
                <td>{{ $peliculaAlquilada->pelicula->director }}</td> 
                <td>{{ $peliculaAlquilada->pelicula->año }}</td> 
                <td>
                    <img width="50" src="{{ $peliculaAlquilada->pelicula->imagen }}" >
                </td>
            </tr>
        @endforeach
    @endempty

@endsection