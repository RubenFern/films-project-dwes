@extends('layouts.app')

@section('content')

    <section class="w-4/6 m-auto">
        <h2 class="text-teal-500 text-center text-3xl font-semibold mt-20 mb-5">¿Quieres alquilar la película de <span class="text-white">{{ $PeliculaAlquilada->titulo }}</span>?</h2>
        
        <form method="POST" action="{{ route('peliculas-alquiladas.store', ['pelicula' => $PeliculaAlquilada]) }}">
            @csrf

            <br>

            <div class="flex justify-center">
                <button class="text-gray-300 bg-gray-700 hover:text-white px-5 py-2 rounded-md text-lg font-medium mr-2" type="submit" name="añadir">
                    Sí
                </button>

                <a class="text-gray-300 bg-gray-700 hover:text-white px-5 py-2 rounded-md text-lg font-medium ml-2" href="{{ URL::previous() }}">No</a>  
            </div>
               
        </form>
    </section>

@endsection