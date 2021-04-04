@extends('layouts.app')

@section('content')
    
<section class="max-w-sm lg:max-w-5xl m-auto mb-6">
    @if ($peliculasAlquiladas->isEmpty())
        <div class="m-auto bg-black p-5 rounded-xl flex flex-col mt-10">
            <h2 class="text-2xl text-center">El usuario {{ $usuario->name }} no tiene ninguna película alquilada</h2> 

            <img class="mt-10" src="/images/films_not_found.jpg" alt="films_not_found.jpg">
        </div>
        
    @else        
        <h1 class="my-8 text-teal-500 text-4xl font-light">Películas alquiladas del usuario <span class="text-white">{{ $usuario->name }}</span></h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach ($peliculasAlquiladas as $peliculaAlquilada)
            <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-full">
                <img class="rounded-l-xl w-32 lg:w-40" src="/images/{{ $peliculaAlquilada->pelicula->imagen }}" alt="{{ $peliculaAlquilada->pelicula->imagen }}">
                <div class="flex flex-col justify-between box-border w-full">
                    <div>
                        <h2 class="text-teal-500 text-xl p-4 pl-6">{{ $peliculaAlquilada->pelicula->titulo }}</h2>
                        <h4 class="text-gray-400 pl-6 mb-2">Año: <span class="text-white">{{ $peliculaAlquilada->pelicula->año }}</span></h4>
                        <h4 class="text-gray-400 pl-6 mb-2">Género: <span class="text-white">{{ $peliculaAlquilada->pelicula->genero->genero }}</span></h4>

                        @if ($peliculaAlquilada->devuelta)
                            <h4 class="text-gray-400 pl-6 mb-1">Fecha de devolución:</h4>
                            <p class="text-white pl-6">
                                {{ \Carbon\Carbon::parse(strtotime($peliculaAlquilada->fecha_devolucion))->formatLocalized('%d de %B de %Y') }}
                                a las
                                {{ \Carbon\Carbon::parse(strtotime($peliculaAlquilada->fecha_devolucion))->formatLocalized('%R') }}
                            </p>
                        @else
                            <h4 class="text-gray-400 pl-6 mb-1">Fecha de alquiler:</h4>
                            <p class="text-white pl-6">
                                {{ \Carbon\Carbon::parse(strtotime($peliculaAlquilada->fecha_alquiler))->formatLocalized('%d de %B de %Y') }}
                                a las
                                {{ \Carbon\Carbon::parse(strtotime($peliculaAlquilada->fecha_alquiler))->formatLocalized('%R') }}
                            </p>
                        @endif
                    </div>         
                </div>
            </div>
        @endforeach
        </div> 

    @endif

</section>

@endsection