@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:w-6/12 sm:mt-10 mb-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-form sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-header-form text-white text-2xl py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Edita al usuario {{ $usuario->name }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 text-black" method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <br>
            
                    <div class="flex flex-wrap">
                        <label for="name" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            Nombre:
                        </label>

                        <input id="name" name="name" type="text" placeholder="Introduce el nombre del usuario"
                            class="form-input w-full @error('name') border-red-500 @enderror" value="{{ old('name') ?? $usuario->name }}">
                    </div>
            
                    <div class="flex flex-wrap">
                        <label class="block text-white text-sm font-bold mb-2 sm:mb-4" for="email">
                            E-Mail:
                        </label>

                        <input id="email" name="email" type="email" placeholder="Introduce el correo electrónico"
                            class="form-input w-full @error('email') border-red-500 @enderror" value="{{ old('email') ?? $usuario->email }}">
                    </div>

                    <div class="flex flex-wrap">
                        <label for="role" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            Role: 
                        </label>

                        <select class="form-select w-full text-black @error('genero') border-red-500 @enderror" name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $usuario->role_id ? 'selected' : ($role->id == $usuario->role_id ? 'selected' : '') }}>{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="flex flex-wrap">
                        <button type="submit" name="añadir"
                        class="w-full mb-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-teal-500 hover:bg-teal-700 sm:py-4">
                            Editar usuario
                        </button>
                    </div>
            
                </form>

            </section>
        </div>
    </div>
</main>
    
@endsection