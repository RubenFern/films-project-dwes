@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:w-6/12 sm:mt-10 mb-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-form sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-header-form text-white text-2xl py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Añade una película') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 text-black" method="POST" action="{{ route('peliculas.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="titulo" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            Título:
                        </label>

                        <input id="titulo" name="titulo" type="text" placeholder="Título de la película"
                            class="form-input w-full @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}">
                    </div>

                    <div class="flex flex-wrap">
                        <label for="genero" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            Género
                        </label>

                        <select class="form-select w-full text-black @error('genero') border-red-500 @enderror" name="id_genero" id="id_genero">
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}" {{ old('id_genero') == $genero->id ? 'selected' : '' }}>{{ $genero->genero }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="sinopsis">
                            Sinopsis:
                        </label>

                        <textarea placeholder="Añade una sinopsis" class="form-textarea w-full text-black @error('sinopsis') border-red-500 @enderror" id="sinopsis" name="sinopsis" cols="30" rows="10">{{ old('sinopsis') }}</textarea>
                    </div>

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="director">
                            Director:
                        </label>

                        <input placeholder="Añade el director" class="form-input w-full @error('director') border-red-500 @enderror" type="text" name="director" value="{{ old('director') }}">
                    </div>

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="cantidad">
                            Cantidad:
                        </label>

                        <input placeholder="Introduce la cantidad" class="form-input w-full @error('cantidad') border-red-500 @enderror" type="number" name="cantidad" value="{{ old('cantidad') }}">
                    </div>

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="precio">
                            Precio:
                        </label>

                        <input placeholder="Introduce el precio" class="form-input w-full @error('precio') border-red-500 @enderror" type="number" name="precio" step="0.01" value="{{ old('precio') }}">
                        <p class="mt-1 text-sm text-gray-300">El precio de estar entre 2.99€ y 49.99€</p>
                    </div>

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="año">
                            Año:
                        </label>

                        <input placeholder="Introduce el año" class="form-input w-full @error('año') border-red-500 @enderror" type="text" name="año" value="{{ old('año') }}">
                    </div>

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="imagen">
                            Imagen:
                        </label>

                        <input class="w-full text-white form-file @error('imagen') border-red-500 @enderror" type="file" name="imagen">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" name="añadir"
                        class="w-full mb-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-teal-500 hover:bg-teal-700 sm:py-4">
                            Añadir película
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>

@endsection