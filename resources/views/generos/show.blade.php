@extends('layouts.app')

@section('content')

    <h2>Visualizo el genero con el id <?php echo $genero->id; ?></h2>

    <table border="1">
        <tr>
            <th>Género</th>
        </tr>
        <tr>
            <td>{{ $genero->genero }}</td>
            <td>
                <form method='POST' action="{{ route('generos.destroy', ['genero' => $genero->id])}}">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Eliminar género">
                </form>
            </td>
        </tr>
    </table>
    
@endsection