@extends('layouts.app')

@section('content')

    <h2>Visualizo todos los generos</h2>

    <table border="1">
        <tr>
            <th>Género</th>
        </tr>
        @foreach ($generos as $genero)
            <tr>
                <td>
                    <a href="{{ route('generos.show', ['genero' => $genero->id]) }}">
                        {{ $genero->genero }}
                    </a>
                </td> 
            </tr>
        @endforeach
    </table>

@endsection