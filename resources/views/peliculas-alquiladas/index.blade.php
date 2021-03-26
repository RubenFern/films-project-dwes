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
                    <a href="{{ route('peliculas.show', ['pelicula' => $peliculaAlquilada->id]) }}">
                        {{ $peliculaAlquilada->titulo }}
                    </a>
                </td> 
                <td>{{ $peliculaAlquilada->sinopsis }}</td> 
                <td>{{ $peliculaAlquilada->director }}</td> 
                <td>{{ $peliculaAlquilada->año }}</td> 
                <td>
                    <img width="50" src="{{ $peliculaAlquilada->imagen }}" >
                </td>
            </tr>
        @endforeach
    @endempty

@endsection