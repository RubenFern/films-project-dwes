@extends('layouts.app')

@section('content')

    <section class="max-w-sm md:max-w-lg lg:max-w-3xl xl:max-w-5xl m-auto mb-6">
        <h1 class="my-10 text-teal-300 ml-4 md:ml-0 text-2xl md:text-3xl font-semibold">Elige el género que quieras</h1>

        <div class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 xl:gap-10">
            @foreach ($generos as $genero)
                <a class="text-gray-300 text-center hover:bg-teal-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" 
                    href="{{ route('generos.show', ['genero' => $genero["id"]]) }}">
                    {{ $genero["nombre"] }} ({{ $genero["numPeliculas"] }})
                </a>
            @endforeach
        </div>
        

    </section>

@endsection