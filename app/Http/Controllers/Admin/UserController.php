<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\PeliculaAlquilada;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
            $peliculasAlquiladas = PeliculaAlquilada::where('id_user', $user)->get();
            $usuario = User::find($user);

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
                    ->route('usuarios.index', ['usuario' => $user])
                    ->withSuccess('Se han actualizado los datos del usuario');
    }

    public function destroy($user)
    {
        $usuario = User::findOrFail($user);

        $usuario->delete();

        return redirect()
                    ->route('usuarios.index', ['usuario' => $user])
                    ->withSuccess('Usuario borrado con exito');
    }
}
