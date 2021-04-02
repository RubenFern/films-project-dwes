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
<body class="bg-body text-white h-screen antialiased leading-none font-sans flex flex-col justify-between">
    <div id="app">
        <header class="bg-header">
            <nav>
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" id="mobile-menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <img src="/images/submenu.svg" alt="submneu.svg">
                    </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        {{-- 
                        La pagina principal será la de welcome solo para usuarios no registrados.
                        Para los registrados la página principal es 'home' 
                        --}}
                        @guest
                            <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-100 no-underline flex items-center">
                                <img class="block mr-2 h-8 w-auto" src="/images/logo.svg" alt="logo.svg">
                                {{ config('app.name', 'FilmsProject-DWES') }}
                            </a>
                        @else
                            <a href="{{ url('/home') }}" class="text-xl font-semibold text-gray-100 no-underline flex items-center">
                                <img class="block mr-2 h-8 w-auto" src="/images/logo.svg" alt="logo.svg">
                                {{ config('app.name', 'FilmsProject-DWES') }}
                            </a>
                        @endguest
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('peliculas.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-medium">Películas</a>
                
                            <a href="{{ route('generos.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-medium">Géneros</a>
                        </div>
                    </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                        <div class="ml-3 relative mr-10 hidden sm:block">
                            @guest    
                                <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                                @if (Route::has('register'))
                                    <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                                @endif
                            @else
                                <div id="user-menu">
                                    <span class="cursor-pointer flex text-teal-400 hover:text-white font-semibold items-center">{{ Auth::user()->name }} <img class="ml-2" src="/images/arrow-down.svg" alt="arrow-down.svg"></span>
                                </div>

                                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-black ring-1 ring-black ring-opacity-5 focus:outline-none options">
                                    @if (optional(Auth::user())->isAdmin())
                                        <a class="block px-4 py-2 text-sm text-white hover:text-gray-400" href="{{ route('admin.index') }}">Panel del administrador</a>
                                    @endif
                                
                                    <a  href="{{ route('logout') }}"
                                        class="flex block px-4 py-2 text-sm text-white hover:text-gray-400"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        <img class="logout ml-3" src="/images/logout.svg" alt="logout.svg">
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endguest
                        </div>
                        
                        @if (!Request::is('home') && !Request::is('/'))
                            <a class="flex text-gray-300 bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-medium" href="{{ URL::previous() }}">
                                <img class="mr-2 icono" src="/images/back.svg" alt="back.svg">
                                {{ __('Atrás') }}
                            </a>  
                        @endif
                    </div>
                </div>
                </div>
            
                <!-- Menú de móvil -->
                <div class="hidden" id="submenu">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        @guest    
                            <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                            @if (Route::has('register'))
                                <a class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                            @endif
                        @else
                            <div id="user-menu">
                                <span class="cursor-pointer flex text-teal-400 hover:text-white font-semibold items-center">{{ Auth::user()->name }} <img class="ml-2" src="/images/arrow-down.svg" alt="arrow-down.svg"></span>
                            </div>

                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-black ring-1 ring-black ring-opacity-5 focus:outline-none options">
                                @if (optional(Auth::user())->isAdmin())
                                    <a class="block px-4 py-2 text-sm text-white hover:text-gray-400" href="{{ route('admin.index') }}">Panel del administrador</a>
                                @endif
                                
                                <a  href="{{ route('logout') }}"
                                    class="flex block px-4 py-2 text-sm text-white hover:text-gray-400"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    <img class="logout ml-3" src="/images/logout.svg" alt="logout.svg">
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        @endguest

                        <a href="{{ route('peliculas.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Películas</a>
                
                        <a href="{{ route('generos.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Géneros</a>
                    </div>
                </div>
            </nav>
        </header>

        
        

        {{-- Control de errores y sucesos --}}
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-1/2 mt-5 m-auto" role="alert">
                <p class="font-semibold">{{ session()->get('success') }}</p>            
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-1/2 mt-5 m-auto" role="alert">
                @foreach ($errors->all() as $error)
                    <p class="font-semibold mb-1">{{ $error }}</p>
                @endforeach
            </div>
            
        @endif
        {{-- Fin del control de errores y sucesos --}}

        @yield('content')

    </div>
    <footer class="bg-footer p-3 flex justify-around items-center">
        @guest
            <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-100 no-underline flex items-center">
                <img class="block mr-2 h-8 w-auto" src="/images/logo.svg" alt="logo.svg">
                {{ config('app.name', 'FilmsProject-DWES') }}
            </a>
        @else
            <a href="{{ url('/home') }}" class="text-xl font-semibold text-gray-100 no-underline flex items-center">
                <img class="block mr-2 h-8 w-auto" src="/images/logo.svg" alt="logo.svg">
                {{ config('app.name', 'FilmsProject-DWES') }}
            </a>
        @endguest

        <a href="https://github.com/RubenFern/FilmsProject-DWES" target="_blank"><img width="30" src="/images/github.svg" alt="github.svg"></a>
    </footer>
</body>
</html>
