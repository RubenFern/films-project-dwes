@extends('layouts.app')

@section('content')

<section class="max-w-sm lg:max-w-5xl m-auto mb-6">
    @if ($historial->isEmpty())
        <div class="m-auto bg-black p-5 rounded-xl flex flex-col mt-10">
            <h2 class="text-2xl text-center mb-5">No has devuelto ninguna película</h2>
            
            <img class="rounded-xl" src="/images/film_not_found2.jpg" alt="film_not_found2.jpg">
        </div>
        
    @else        
        <h1 class="my-8 text-teal-500 font-light text-4xl text-center">Has devuelto estas películas</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach ($historial as $peliculaDevuelta)
            <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-full">
                <img class="rounded-l-xl w-32 lg:w-44" src="/images/{{ $peliculaDevuelta->pelicula->imagen }}" alt="{{ $peliculaDevuelta->pelicula->imagen }}">
                <div class="flex flex-col justify-between box-border w-full">
                    <div class="pl-5">
                        <h2 class="text-teal-500 text-xl py-4">{{ $peliculaDevuelta->pelicula->titulo }}</h2>
                        <h4 class="text-gray-400 mb-1">Año: <span class="text-white">{{ $peliculaDevuelta->pelicula->año }}</span></h4>
                        <h4 class="text-gray-400 mb-1">Género: <span class="text-white">{{ $peliculaDevuelta->pelicula->genero->genero }}</span></h4>
                        <h4 class="text-gray-400 mt-2 mb-1">Fecha de alquiler:</h4>
                        <p>
                            {{ \Carbon\Carbon::parse(strtotime($peliculaDevuelta->fecha_alquiler))->formatLocalized('%d de %B de %Y') }}
                            a las
                            {{ \Carbon\Carbon::parse(strtotime($peliculaDevuelta->fecha_alquiler))->formatLocalized('%R') }}
                        </p>
                        <h4 class="text-gray-400 mt-2 mb-1">Fecha de devolución:</h4>
                        <p>
                            {{ \Carbon\Carbon::parse(strtotime($peliculaDevuelta->fecha_devolucion))->formatLocalized('%d de %B de %Y') }}
                            a las
                            {{ \Carbon\Carbon::parse(strtotime($peliculaDevuelta->fecha_alquiler))->formatLocalized('%R') }}
                        </p>
                    </div>         
                        
                    <div class="pl-4 mb-7 m-auto">
                        <a class="bg-teal-500 py-2 px-16 rounded-xl" href="{{ route('peliculas-alquiladas.create', ['pelicula' => $peliculaDevuelta->pelicula->id]) }}">Volver a alquilar</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div> 

    @endif

</section>

@endsection