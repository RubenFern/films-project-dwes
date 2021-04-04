@extends('layouts.app')

@section('content')

    <section class="w-5/6 m-auto mb-6">
        <h1 class="my-8 text-teal-500 text-3xl font-semibold">Lista de todos los usuarios</h1>

        <table class="rounded-t-lg m-5 w-full mx-auto bg-header text-gray-200">
            <thead>
                <tr class="text-left border-b border-gray-300 text-center">
                    <th class="px-4 py-3">ID de usuario</th> 
                    <th class="px-4 py-3">Nombre</th> 
                    <th class="px-4 py-3">Correo electrónico</th> 
                    <th class="px-4 py-3">Role</th> 
                    <th class="px-4 py-3">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="bg-body border border-gray-600 text-center">
                        <td class="px-4 py-3 text-center">{{ $usuario->id }}</td>
                        <td class="px-4 py-3">{{ $usuario->name }}</td>
                        <td class="px-4 py-3">{{ $usuario->email }}</td>
                        <td class="px-4 py-3">{{ $usuario->role->role }}</td>
                        <td class="px-4 py-3 flex items-center justify-center">
                            <a class="text-white bg-teal-500 hover:bg-teal-700 px-3 py-2 rounded-md text-sm font-medium cursor-pointer mr-2" 
                                href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}">Editar</a>
                            <form method='POST' action="{{ route('usuarios.destroy', ['usuario' => $usuario->id])}}">
                                @csrf
                                @method('DELETE')
            
                                <input class="text-white bg-teal-500 hover:bg-teal-700 px-3 py-2 rounded-md text-sm font-medium cursor-pointer ml-2 mr-2" 
                                    type="submit" value="Eliminar">
                            </form>
                            <a class="text-white bg-teal-500 hover:bg-teal-700 px-3 py-2 rounded-md text-sm font-medium cursor-pointer ml-2" 
                                href="{{ route('usuarios.show', ['usuario' => $usuario->id]) }}">Películas alquiladas</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </section>
    
@endsection