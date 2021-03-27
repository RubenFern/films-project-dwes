@extends('layouts.app')

@section('content')

    <h2>Quieres alquilar esta película??</h2>
    
    <form method="POST" action="{{ route('peliculas-alquiladas.store', ['pelicula' => $PeliculaAlquilada]) }}">
        @csrf

        <br>

        <input type="submit" name="añadir" value="Sí">
        <a href="{{ URL::previous() }}">No</a>

        {{-- 
        Muestro un mensaje en caso de alquilar una película y que el usuario ya la tenga alquilada. 
        El error es flash, por lo que al recargar la página se elimina el error.
        --}}
        @if (session()->has('ya_alquilada'))
            <p>{{ session()->get('ya_alquilada') }}</p>
        @endif

        @if (session()->has('alquilada'))
            <p>{{ session()->get('alquilada') }}</p>            
        @endif
    </form>

@endsection