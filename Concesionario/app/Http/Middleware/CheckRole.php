<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */

     
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Verifica si el usuario tiene el rol adecuado
            if (auth()->user()->role !== $role) {
                // Si no tiene el rol adecuado, redirige al usuario
                return redirect('/'); // Puedes redirigir a la página de inicio u otra página
            }
        } else {
            // Si el usuario no está autenticado, redirige al login
            return redirect()->route('login');
        }

        // Si todo está correcto, permite que la solicitud continúe
        return $next($request);
    }
}
