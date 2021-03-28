@extends('layouts.app')

@section('content')

    <section class="w-4/6 m-auto">
        <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-full mt-10">
            <img class="rounded-l-xl" src="{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}">
            <div class="flex flex-col justify-between box-border w-full">
                <div>
                    <h2 class="text-teal-100 text-xl lg:text-2xl p-4 pl-10">{{ $pelicula->titulo }}</h2>
                    <h4 class="text-gray-600 pl-10">Año: <span class="text-white">{{ $pelicula->año }}</span></h4>
                    <h4 class="text-gray-600 pl-10">Género: <span class="text-white">{{ $pelicula->genero->genero }}</span></h4>
                    <p class="px-10 pt-4 text-justify">
                        {{ $pelicula->sinopsis }}
                    </p>
                </div>         
                
                <div class="pl-4 mb-7 m-auto">
                    <a class="bg-teal-500 py-2 px-16 rounded-xl" href="{{ route('peliculas-alquiladas.create', ['pelicula' => $pelicula->id]) }}">Alquilar</a>
                </div>
            </div>
        </div>
    </section>
    
    
@endsection