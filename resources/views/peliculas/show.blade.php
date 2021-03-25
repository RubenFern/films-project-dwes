<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Información de la película <?php echo $pelicula->id; ?></h2>

    <table border="1">
        <tr>
            <th>Título</th> <th>Sinopsis</th> <th>Director</th> <th>Año</th> <th>imagen</th>
        </tr>
        <tr>
            <td>{{ $pelicula->titulo }}</td> 
            <td>{{ $pelicula->sinopsis }}</td> 
            <td>{{ $pelicula->director }}</td> 
            <td>{{ $pelicula->año }}</td> 
            <td><img width="50" src="{{ $pelicula->imagen }}" ></td>
        </tr>
    </table>
</body>
</html>