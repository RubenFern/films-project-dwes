<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .bg-body {background-color: #262626;}

        main {
            margin: auto;
            margin-top: 4rem;
            width: 50%;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        .text-gray-600 {color: rgb(180, 180, 180);}

        .text-teal-400 {color: #4fd1c5;}

        span {color: #fff}

        h1 {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .flex {
            display: flex;
            background-color: #000;
            border-radius: 1rem;
        }

        .flex-col {flex-direction: column;}

        .justify-between {justify-content: space-between;}

        .rounded-l-xl {
            border-top-left-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
        }
        .pl-5 {padding-left: 1.25rem;}
        .pr-5 {padding-right: 1.25rem;}
        .text-center {text-align: center;}
        .text-justify {text-align: justify;}
        .w-52 {width: 13rem;}

    </style>

    <title>Document</title>
</head>
<body class="bg-body">
    <main>
        <h1 class="text-3xl text-center text-white text-teal-400 font-semibold">
            Hola <span class="text-gray-200">{{ $usuario->name }}</span> Has alquilado la película de <span class="text-gray-200">{{ $peliculaAlquilada->pelicula->titulo }}</span>
        </h1>

        <div class="flex bg-black bg-opacity-50 rounded-2xl box-border w-3/6 m-auto mt-10">
            <img class="rounded-l-xl w-52" src="http://filmsproject-dwes.test/images/{{ $peliculaAlquilada->pelicula->imagen }}" alt="{{ $peliculaAlquilada->pelicula->imagen }}">
            <div class="flex flex-col justify-between box-border w-full">
                <div>
                    <h2 class="text-teal-400 text-xl p-4 pl-5">{{ $peliculaAlquilada->pelicula->titulo }}</h2>
                    <h4 class="text-gray-600 pl-5 mb-1">Año: <span class="text-white">{{ $peliculaAlquilada->pelicula->año }}</span></h4>
                    <h4 class="text-gray-600 pl-5">Género: <span class="text-white">{{ $peliculaAlquilada->pelicula->genero->genero }}</span></h4>
                    <p class="text-gray-600 pl-5 text-justify pr-5">Sinopsis: <br><span class="text-white">{{ $peliculaAlquilada->pelicula->sinopsis }}</span></p>
                </div>         
            </div>
        </div>
    </main>
</body>
</html>