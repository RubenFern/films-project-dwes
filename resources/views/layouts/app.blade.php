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

    <link rel="shortcut icon" href="/images/logo.svg" />
</head>
<body class="bg-body text-white h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-header py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div class="flex items-center">
                    {{-- 
                        La pagina principal será la de welcome solo para usuarios no registrados.
                        Para los registrados la página principal es 'home' 
                    --}}
                    @guest
                        <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-100 no-underline flex items-center">
                            <img class="w-9 mr-3" src="/images/logo.svg" alt="logo.svg">
                            {{ config('app.name', 'FilmsProject-DWES') }}
                        </a>
                    @else
                        <a href="{{ url('/home') }}" class="text-xl font-semibold text-gray-100 no-underline flex items-center">
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
                                <a href="{{ route('peliculas.index') }}" class="hover:underline">{{ __('Películas') }}</a>
                            </li>

                            <li>
                                <a href="{{ route('generos.index') }}" class="hover:underline">{{ __('Géneros') }}</a>
                            </li>

                            <li class="desplegable-padre">
                                <span class="cursor-pointer flex text-white items-center" id="usuario">{{ Auth::user()->name }} <img class="ml-2" src="/images/arrow-down.svg" alt="arrow-down.svg"></span>

                                <div class=" desplegable bg-teal-700 absolute mt-4 w-50 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none py-2 px-4" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <div class="py-1" role="none">
                                        
                                        @if (optional(Auth::user())->isAdmin())
                                            <a class="pb-10 hover:underline" href="{{ route('admin.index') }}">Panel del administrador</a>
                                        @endif
                                      
                                        <a  href="{{ route('logout') }}"
                                            class="mt-2 no-underline hover:underline flex items-center text-gray-100"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            <img class="logout ml-3" src="/images/logout.svg" alt="logout.svg">
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </li>

                            @if (!Request::is('home') && !Request::is('/'))
                                <a class="focus:outline-none text-gray-300 text-md font-semibold py-1 px-3 rounded-md bg-teal-500 hover:bg-teal-700 hover:shadow-lg flex items-center" href="{{ URL::previous() }}">
                                    <img class="mr-2 icono" src="/images/back.svg" alt="back.svg">
                                    {{ __('Atrás') }}
                                </a>  
                            @endif
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        
        

        {{-- Control de errores y sucesos --}}
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-1/2 m-5" role="alert">
                <p class="font-semibold">{{ session()->get('success') }}</p>            
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-1/2 m-5" role="alert">
                @foreach ($errors->all() as $error)
                    <p class="font-semibold mb-1">{{ $error }}</p>
                @endforeach
            </div>
            
        @endif
        {{-- Fin del control de errores y sucesos --}}

        @yield('content')
    </div>
</body>
</html>
