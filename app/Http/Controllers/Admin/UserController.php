<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\PeliculaAlquilada;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function show($user)
    {
        if ($user == 1)
        {
            return redirect()
                        ->route('usuarios.index', ['usuario' => $user])
                        ->withErrors('Los administradores no pueden alquilar películas');
        } else
        {
            $usuario = User::findOrFail($user);
            $peliculasAlquiladas = PeliculaAlquilada::where('id_user', $usuario->id)->get();

            return view('usuarios.show', compact('peliculasAlquiladas', 'usuario'));
        }
    }

    public function edit(User $usuario)
    {
        $roles = Role::all();

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(UserRequest $request, $user)
    {   
        $usuario = User::findOrFail($user);
        
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()
                    ->route('usuarios.index', ['usuario' => $usuario->id])
                    ->withSuccess('Se han actualizado los datos del usuario');
    }

    public function destroy($user)
    {
        
        $usuario = User::findOrFail($user);
        
        // Compruebo que el usuario que se quiere borrar no sea el mismo que está logueado
        if ($usuario->id == Auth::user()->id)
        {
            return redirect()
                    ->route('usuarios.index', ['usuario' => $usuario->id])
                    ->withErrors('No te puedes borrar a ti mismo');
        } else
        {
            $usuario->delete();

            return redirect()
                        ->route('usuarios.index', ['usuario' => $usuario->id])
                        ->withSuccess('Usuario borrado con exito');
        }

        
    }
}
