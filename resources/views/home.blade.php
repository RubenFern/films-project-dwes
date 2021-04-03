@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <a class="text-white bg-teal-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('peliculas-alquiladas.index') }}">Ver películas alquiladas</a>

        <h1 class="text-2xl text-teal-400 font-semibold text-center">Hola {{ Auth::user()->name }}, tienes alquiladas {{ $numPeliculasAlquiladas }} de 6 películas.</h1>

        <section class="w-5/6 m-auto mt-15">
            <h2 class="text-xl text-center">Sugerencias</h2>
            <div class="flex items-start w-full p-6">
                @foreach ($sugerenciaDePeliculas as $pelicula)
                    <div class="m-auto ml-4">
                        <a href="{{ route('peliculas.show', ['pelicula' => $pelicula->id]) }}"><img class="m-auto img-sugerencia" src="images/{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}"></a>
                        <a href="{{ route('peliculas.show', ['pelicula' => $pelicula->id]) }}"><p class="text-center mt-4">{{ $pelicula->titulo }}</p></a>
                    </div>
                @endforeach
            </div>
        </section>
        
    </div>
</main>
@endsection
