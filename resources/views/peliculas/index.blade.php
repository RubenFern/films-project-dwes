<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Muestro todas las películas</h2>

    <table border="1">
        <tr>
            <th>Título</th> <th>Sinopsis</th> <th>Director</th> <th>Año</th> <th>imagen</th>
        </tr>
        @foreach ($peliculas as $pelicula)
            <tr>
                <td><a href="peliculas/{{ $pelicula->id }}">{{ $pelicula->titulo }}</a></td> 
                <td>{{ $pelicula->sinopsis }}</td> 
                <td>{{ $pelicula->director }}</td> 
                <td>{{ $pelicula->año }}</td> 
                <td><img width="50" src="{{ $pelicula->imagen }}" ></td>
            </tr>
        @endforeach
    </table>
    
</body>
</html>