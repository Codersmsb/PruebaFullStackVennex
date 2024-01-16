<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth::user()->fullacces == 'yes') {
            return $next($request); // Si es admin, redirige al dashboard
        } elseif (auth::user()->fullacces == 'asesor') {
            return redirect('asesor'); // Si es asesor, redirige al dashboard de asesor
        }
        elseif (auth::user()->fullacces == 'gerente') {
            return redirect('gerente'); // Si es asesor, redirige al dashboard de asesor
        }
    
        return redirect('user'); // Por defecto, redirige a la ruta de usuario normal
    }
    
}
