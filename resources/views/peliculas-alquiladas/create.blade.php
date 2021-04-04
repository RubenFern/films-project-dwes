@extends('layouts.app')

@section('content')

    <section class="w-4/6 m-auto">
        <h2 class="text-gray-400 text-center text-3xl font-semibold mt-20 mb-5">¿Quieres alquilar la película de <span class="text-white">{{ $PeliculaAlquilada->titulo }}</span>?</h2>
        
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

        <div class="mt-10 m-auto">
            <h1 class="text-3xl text-gray-400 font-light text-center mb-5">Detalles del pedido:</h1>
            <div class="flex justify-center">
                <img class="rounded-xl" src="/images/{{ $PeliculaAlquilada->imagen }}" alt="">
                <div class="mt-6">
                    <h4 class="text-gray-400 text-lg font-semibold pl-10">Director: <span class="text-white font-light">{{ $PeliculaAlquilada->director }}</span></h4>
                    <h4 class="text-gray-400 text-lg font-semibold pl-10 mt-2">Año: <span class="text-white font-light">{{ $PeliculaAlquilada->año }}</span></h4>
                    <h4 class="text-gray-400 text-lg font-semibold pl-10 mt-2">Género: <span class="text-white font-light">{{ $PeliculaAlquilada->genero->genero }}</span></h4>
                    <h4 class="text-gray-400 text-lg font-semibold pl-10 mt-2">Precio: <span class="text-white font-light">{{ $PeliculaAlquilada->precio }}€</span></h4>
                    <p class="px-10 pt-4 text-justify leading-5 max-w-xl">
                        {{ $PeliculaAlquilada->sinopsis }}
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection