<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si existe un usuario, y es administrador
        if ($request->user() != null && $request->user()->isAdmin())
        {
            return $next($request);
        }

        // Si no es administrador retorno un error con el mensaje de que no tienes permisos para acceder
        abort(403);
    }
}
