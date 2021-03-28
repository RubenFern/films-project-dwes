@extends('layouts.app')

@section('content')

    <section class="w-4/6 m-auto">
        <h2 class="text-teal-500 text-3xl font-semibold">¿Quieres alquilar la pleícula de <span class="text-teal-200">{{ $PeliculaAlquilada->titulo }}</span></h2>
        
        <form method="POST" action="{{ route('peliculas-alquiladas.store', ['pelicula' => $PeliculaAlquilada]) }}">
            @csrf

            <br>

            <div class="flex justify-center mt-20">
                <button class="mr-5 bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded-lg" type="submit" name="añadir">
                    Sí
                </button>

                <a class="mr-5 bg-teal-600 hover:bg-teal-700 text-white font-bold py-1.5 px-6 rounded-lg" href="{{ URL::previous() }}">No</a>  
            </div>
               
        </form>
    </section>
    

@endsection