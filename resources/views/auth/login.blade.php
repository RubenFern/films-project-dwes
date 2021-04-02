@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-form sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-header-form text-gray-200 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Inicia sesión') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Correo electrónico') }}:
                        </label>

                        <input id="email" type="email" placeholder="Introduce tu E-Mail"
                            class="form-input w-full @error('email') border-red-500 @enderror text-black" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Contraseña') }}:
                        </label>

                        <input id="password" type="password" placeholder="Introduce tu contraseña"
                            class="form-input w-full @error('password') border-red-500 @enderror text-black" name="password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="inline-flex items-center text-sm text-white" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Recuérdame') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-sm text-teal-500 hover:text-teal-400 whitespace-no-wrap no-underline hover:underline ml-auto"
                            href="{{ route('password.request') }}">
                            {{ __('¿Has olvidado tu contraseña?') }}
                        </a>
                        @endif
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-teal-500 hover:bg-teal-700 sm:py-4">
                            {{ __('Entrar') }}
                        </button>

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-white my-6 sm:text-sm sm:my-8">
                            {{ __("¿No tienes una cuenta?") }}
                            <a class="text-teal-500 hover:text-teal-400 no-underline hover:underline" href="{{ route('register') }}">
                                {{ __('Regístrate') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
