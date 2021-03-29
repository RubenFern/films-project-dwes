@extends('layouts.app')

@section('content')
    
    <div class="mx-32">
        <h2 class="text-3xl mt-7 mb-10">Panel del Administrador</h2>

       
        <a class="py-2 px-4 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
            href="{{ route('peliculas.create') }}">Añadir película</a>
       
        <a class="py-2 px-4 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
            href="{{ route('generos.create') }}">Añadir género</a>                
      
        <div class="mt-5 admin-info">
            <aside>
                @foreach ($generos as $genero)
                    <p class="text-center">{{ $genero->genero }}</p>
                @endforeach
            </aside>
            <main class="grid grid-cols-4 gap-10">
                @foreach ($peliculas as $pelicula)
                    <div class="rounded-xl">
                        <img class="rounded-xl " src="{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}">

                        <h1 class="text-center mt-1 text-lg">{{ $pelicula->titulo }}</h1>

                        <div class="flex justify-around mt-4">
                            <a class="py-2 px-4 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
                                href="{{ route('peliculas.edit', ['pelicula' => $pelicula->id]) }}">Editar</a>                

                            <form method='POST' action="{{ route('peliculas.destroy', ['pelicula' => $pelicula->id])}}">
                                @csrf
                                @method('DELETE')
            
                                <input class="py-2 px-4 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
                                    type="submit" value="Eliminar">
                            </form>
                        </div>
                        
                    </div>
                @endforeach
            </main>
        </div>
    </div>

@endsection