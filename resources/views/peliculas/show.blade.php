@extends('layouts.app')

@section('content')

    <section class="w-full m-auto">
        <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-4/6 mt-10 m-auto">
            <img class="rounded-l-xl w-80" src="/images/{{ $pelicula->imagen }}" alt="{{ $pelicula->imagen }}">
            <div class="flex flex-col justify-between box-border w-full">
                <div>
                    <h2 class="text-teal-500 text-xl lg:text-2xl p-4 pl-10">{{ $pelicula->titulo }}</h2>
                    <h4 class="text-gray-600 pl-10">Año: <span class="text-white">{{ $pelicula->año }}</span></h4>
                    <h4 class="text-gray-600 pl-10">Género: <span class="text-white">{{ $pelicula->genero->genero }}</span></h4>
                    <p class="px-10 pt-4 text-justify leading-5">
                        {{ $pelicula->sinopsis }}
                    </p>
                </div>         
                
                <div class="pl-4 mb-7 m-auto">
                    @auth
                        @if (Auth::user()->id == 1)
                            <div class="flex justify-between">
                                <a class="bg-teal-500 py-2 px-16 rounded-xl mr-2 hover:bg-teal-700" 
                                href="{{ route('peliculas.edit', ['pelicula' => $pelicula->id]) }}">Editar</a>
                                <form class="ml-2" method='POST' action="{{ route('peliculas.destroy', ['pelicula' => $pelicula->id])}}">
                                    @csrf
                                    @method('DELETE')
                
                                    <input class="bg-teal-500 hover:bg-teal-700 py-2 px-16 rounded-xl cursor-pointer" 
                                        type="submit" value="Eliminar">
                                </form>
                            </div>
                        @else
                            @if (!$alquilada)
                                <a class="bg-teal-500 py-2 px-16 rounded-xl" href="{{ route('peliculas-alquiladas.create', ['pelicula' => $pelicula->id]) }}">Alquilar</a>
                            @else
                                <a class="bg-teal-500 py-2 px-16 rounded-xl" href="{{ route('peliculas-alquiladas.edit', ['pelicula_alquilada' => $alquilada->id]) }}">Devolver</a>
                            @endif       
                        @endif
                    @endauth
                    
                </div>
            </div>
        </div>
    </section>
    
    
@endsection