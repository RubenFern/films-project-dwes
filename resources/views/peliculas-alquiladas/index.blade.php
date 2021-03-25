<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if ($peliculasAlquiladas)
        <h2>No tienes ninguna película alquilada</h2>

        <p><a href="peliculas">Echa un vistazo a nuestras películas</a></p>
    @else
        <h2>El usuario visualiza las peliculas alquiladas</h2>
    @endif

</body>
</html>