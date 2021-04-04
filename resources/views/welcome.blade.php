@extends('layouts.app')

@section('content')

    <div class="grid gap-5 p-8 text-justify leading-5 sm:grid-cols-2 md:grid-cols-3 md:mx-10 lg:mx-15 lg:gap-10 xl:mx-56 text-lg font-light leading-7">
        <article>
            <h2 class="text-gray-400 text-2xl mb-3">Regístrate</h2>
            <p>
                Crear una cuenta es gratuito. Y te permitirá alquilar hasta un máximo de 6 películas.
            </p>
        </article>
        <article>
            <h2 class="text-gray-400 text-2xl mb-3">Los útlimos estrenos</h2>
            <p>
                Disfruta de todas nuestras películas por un precio muy asequible... ¡¡Desde 2.99€!!
            </p>
        </article>
        <article>
            <h2 class="text-gray-400 text-2xl mb-3">Nos importa tu privacidad</h2>
            <p>
                Si en algún momento decides borrar tu cuenta, borraremos todo tu registro de películas alquiladas.
            </p>
        </article>
    </div>
    
    <img class="m-auto" src="/images/portada.png" alt="portada.png">

@endsection
