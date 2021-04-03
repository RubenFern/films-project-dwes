@extends('layouts.app')

@section('content')
    
<section class="max-w-sm lg:max-w-5xl m-auto mb-6">
    @if ($peliculasAlquiladas->isEmpty())
        <div class="m-auto bg-black p-5 rounded-xl flex flex-col mt-10">
            <h2 class="text-2xl text-center">No tienes ninguna película alquilada</h2>

            <p class="text-center my-8">
                <a class="text-gray-300 hover:text-white bg-gray-700 px-3 py-2 rounded-md text-md font-medium" 
                href="{{ route('peliculas.index') }}">Echa un vistazo a nuestras películas</a>
            </p>
            

            <img src="/images/films_not_found.jpg" alt="films_not_found.jpg">
        </div>
        
    @else        
        <h1 class="my-8 text-teal-300 text-3xl font-semibold">Tus películas alquiladas</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach ($peliculasAlquiladas as $peliculaAlquilada)
            <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-full">
                <img class="rounded-l-xl w-32 lg:w-40" src="/images/{{ $peliculaAlquilada->pelicula->imagen }}" alt="{{ $peliculaAlquilada->pelicula->imagen }}">
                <div class="flex flex-col justify-between box-border w-full">
                    <div>
                        <h2 class="text-teal-100 text-xl p-4 pl-10">{{ $peliculaAlquilada->pelicula->titulo }}</h2>
                        <h4 class="text-gray-600 pl-10 mb-1">Año: <span class="text-white">{{ $peliculaAlquilada->pelicula->año }}</span></h4>
                        <h4 class="text-gray-600 pl-10">Género: <span class="text-white">{{ $peliculaAlquilada->pelicula->genero->genero }}</span></h4>
                    </div>         
                        
                    <div class="pl-4 mb-7 m-auto">
                        <a class="bg-teal-500 py-2 px-16 rounded-xl" href="{{ route('peliculas-alquiladas.edit', ['pelicula_alquilada' => $peliculaAlquilada->id]) }}">Devolver</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div> 

    @endif

</section>

@endsection