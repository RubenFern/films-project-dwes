@extends('layouts.app')

@section('content')

    @forelse ($peliculasAlquiladas as $peliculaAlquilada)
        <h2>El usuario visualiza las peliculas alquiladas</h2>
    @empty
        <h2>No tienes ninguna película alquilada</h2>

        <p><a href="">Echa un vistazo a nuestras películas</a></p>
    @endforelse

@endsection