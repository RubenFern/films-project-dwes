@extends('layouts.app')

@section('content')


    <section class="w-3/4 m-auto">
        <h1 class="text-teal-300 text-3xl mb-5 font-semibold">Muestro todas las películas</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ($peliculas as $pelicula)
                <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-full">
                    <img class="rounded-l-xl" src="{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}">
                    <div class="flex flex-col justify-between box-border w-full">
                        <div>
                            <h2 class="text-teal-100 text-xl p-4 pl-10">{{ $pelicula->titulo }}</h2>
                            <h4 class="text-gray-600 pl-10">Año: <span class="text-white">{{ $pelicula->año }}</span></h4>
                            <h4 class="text-gray-600 pl-10">Género: <span class="text-white"></span></h4>
                        </div>         
                        
                        <div class="pl-4 mb-7 m-auto">
                            <a class="bg-teal-500 py-2 px-16 rounded-xl" href="{{ route('peliculas.show', ['pelicula' => $pelicula->id]) }}">Ver película</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </section>
    
@endsection