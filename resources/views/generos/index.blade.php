<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Visualizo todos los generos</h2>

    <table border="1">
        <tr>
            <th>Género</th>
        </tr>
        @foreach ($generos as $genero)
            <tr>
                <td><a href="generos/{{ $genero->id }}">{{ $genero->genero }}</a></td> 
            </tr>
        @endforeach
    </table>
</body>
</html>