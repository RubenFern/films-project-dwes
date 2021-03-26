@extends('layouts.app')

@section('content')

    <h2>Información de la película <?php echo $pelicula->id; ?></h2>

    <table border="1">
        <tr>
            <th>Título</th> <th>Sinopsis</th> <th>Director</th> <th>Año</th> <th>imagen</th>
        </tr>
        <tr>
            <td>{{ $pelicula->titulo }}</td> 
            <td>{{ $pelicula->sinopsis }}</td> 
            <td>{{ $pelicula->director }}</td> 
            <td>{{ $pelicula->año }}</td> 
            <td><img width="50" src="{{ $pelicula->imagen }}" ></td>
            <td>
                <form method='POST' action="{{ route('peliculas.destroy', ['pelicula' => $pelicula->id])}}">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Eliminar película">
                </form>
            </td>
        </tr>
    </table>
    
@endsection