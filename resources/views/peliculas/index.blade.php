@extends('layouts.app')

@section('content')


    <section class="max-w-sm lg:max-w-5xl m-auto mb-6">
        <h1 class="my-8 text-teal-300 text-3xl font-semibold">Nuestro catálogo</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ($peliculas as $pelicula)
                <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-full">
                    <img class="rounded-l-xl w-32 lg:w-40" src="/images/{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}">
                    <div class="flex flex-col justify-between box-border w-full">
                        <div>
                            <h2 class="text-teal-100 text-xl p-4 pl-10">{{ $pelicula->titulo }}</h2>
                            <h4 class="text-gray-600 pl-10 mb-1">Año: <span class="text-white">{{ $pelicula->año }}</span></h4>
                            <h4 class="text-gray-600 pl-10 mb-1">Género: <span class="text-white">{{ $pelicula->genero->genero }}</span></h4>
                            <h4 class="text-gray-600 pl-10">Precio: <span class="text-white">{{ $pelicula->precio }}€</span></h4>
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