@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:w-6/12 sm:mt-10 mb-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-form sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-header-form text-white text-2xl py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Añade un género') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 text-black" method="POST" action="{{ route('generos.store') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="precio">
                            Nombre del género:
                        </label>

                        <input placeholder="Introduce el género" class="form-input w-full @error('precio') border-red-500 @enderror" type="text" name="genero" value="{{ old('genero') }}">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" name="añadir"
                        class="w-full mb-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-teal-500 hover:bg-teal-700 sm:py-4">
                            Añadir género
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
        
@endsection
