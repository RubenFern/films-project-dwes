<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FilmsProject-DWES') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/desplegable.js"></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="bg-body text-white h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-header py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    {{-- 
                        La pagina principal será la de welcome solo para usuarios no registrados.
                        Para los registrados la página principal es 'home' 
                    --}}
                    @guest
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline flex items-center">
                            <img class="w-9 mr-3" src="/images/logo.svg" alt="logo.svg">
                            {{ config('app.name', 'FilmsProject-DWES') }}
                        </a>
                    @else
                        <a href="{{ url('/home') }}" class="text-lg font-semibold text-gray-100 no-underline flex items-center">
                            <img class="w-9 mr-3" src="/images/logo.svg" alt="logo.svg">
                            {{ config('app.name', 'FilmsProject-DWES') }}
                        </a>
                    @endguest
                </div>
                <nav class="text-gray-300 text-sm sm:text-base">
                    <ul class="space-x-8 flex">
                        @guest
                            <li>
                                <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('peliculas.create') }}" class="flex items-center hover:underline">{{ __('Añadir película') }} <img class="ml-2 items-center" src="/images/add.svg" alt="add.svg"></a>
                            </li>

                            <li>
                                <a href="{{ route('peliculas.index') }}" class="hover:underline">{{ __('Películas') }}</a>
                            </li>

                            <li>
                                <a href="{{ route('generos.index') }}" class="hover:underline">{{ __('Géneros') }}</a>
                            </li>

                            <li class="desplegable-padre">
                                <span class="cursor-pointer flex text-white items-center" id="usuario">{{ Auth::user()->name }} <img class="ml-2" src="/images/arrow-down.svg" alt="arrow-down.svg"></span>

                                <div class=" desplegable bg-body absolute mt-2 w-40 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none p-4" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <div class="py-1" role="none">
                                        <a  href="{{ route('logout') }}"
                                            class="no-underline hover:underline flex items-center text-gray-100"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            <img class="ml-3 text-xs" src="/images/logout.svg" alt="logout.svg">
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        <div class="inline-block m-6 mr-24 flex justify-end">
            <a class="focus:outline-none text-gray-300 text-md font-semibold py-2.5 px-5 rounded-md bg-gray-500 hover:bg-gray-600 hover:shadow-lg flex items-center" href="{{ URL::previous() }}">
                <img class="mr-2" src="/images/back.svg" alt="back.svg">
                {{ __('Atrás') }}
            </a>
        </div>
        

        {{-- Control de errores y sucesos --}}
        @if (session()->has('success'))
            <p>{{ session()->get('success') }}</p>            
        @endif

        @if (isset($errors) && $errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        {{-- Fin del control de errores y sucesos --}}

        @yield('content')
    </div>
</body>
</html>
