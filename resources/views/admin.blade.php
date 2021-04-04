@extends('layouts.app')

@section('content')
    
    <div class="mx-5">
        <div class="text-center">
            <h2 class="text-3xl mt-7 mb-10">Panel del Administrador</h2>

        
            <a class="py-2 px-4 mr-1 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
                href="{{ route('peliculas.create') }}">Añadir película</a>
        
            <a class="py-2 px-4 ml-1 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
                href="{{ route('generos.create') }}">Añadir género</a>  
        </div>
                      
        <div class="mt-10 admin-info">
            <table class="rounded-xl m-5 w-full mx-auto bg-header text-gray-200">
                @foreach ($generos as $genero)
                    <tr class="border-b border-gray-300">
                        <td class="p-3">
                            <p class="text-center">{{ $genero->genero }}</p>
                        </td>
                        <td class="p-3">
                            <a  class="text-white bg-teal-500 hover:bg-teal-700 px-3 py-1.5 rounded-md text-sm font-medium" 
                            href="{{ route('generos.edit', ['genero' => $genero->id]) }}">Editar</a>
                        </td>
                        <td class="p-3">
                            <form method='POST' action="{{ route('generos.destroy', ['genero' => $genero->id])}}">
                                @csrf
                                @method('DELETE')
            
                                <input class="text-white bg-teal-500 hover:bg-teal-700 px-3 py-2 rounded-md text-sm font-medium cursor-pointer" 
                                    type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <main class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 ml-15 gap-10 mb-10">
                @foreach ($peliculas as $pelicula)
                    <div class="rounded-xl">
                        <a href="{{ route('peliculas.show', ['pelicula' => $pelicula->id]) }}"><img class="rounded-xl m-auto w-64" src="/images/{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}"></a>

                        <h1 class="text-center mt-2 text-xl">{{ $pelicula->titulo }}</h1>

                        <div class="flex justify-center mt-4">
                            <a class="py-2 px-4 mr-4 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-75" 
                                href="{{ route('peliculas.edit', ['pelicula' => $pelicula->id]) }}">Editar</a>                

                            <form method='POST' class="ml-4" action="{{ route('peliculas.destroy', ['pelicula' => $pelicula->id])}}">
                                @csrf
                                @method('DELETE')
            
                                <input class="py-2 px-4 bg-teal-500 text-white font-semibold rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 cursor-pointer focus:ring-teal-400 focus:ring-opacity-75" 
                                    type="submit" value="Eliminar">
                            </form>
                        </div>
                        
                    </div>
                @endforeach
            </main>
        </div>
    </div>

@endsection