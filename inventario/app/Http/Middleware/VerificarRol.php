<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerificarRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('login');
        }

        // Obtiene el usuario autenticado
        $usuario = Auth::user();
        
        // Verifica si el rol del usuario está en la lista de roles permitidos
        if (in_array($usuario->idRol, $roles)) {
            return $next($request);
        }
        
        // Si no tiene acceso, redirige a una página de error o al dashboard
        return redirect('/')->with('error', 'No tienes permisos para acceder a esta sección');
    }
}