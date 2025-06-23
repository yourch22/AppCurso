<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMatricula
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $curso = $request->route('curso');

        // Si es admin, permitir acceso
        if (strtolower($user->role) === 'admin') {
            return $next($request);
        }

        // Si está matriculado, permitir acceso
        if ($user->cursosMatriculados()->where('curso_id', $curso->id)->exists()) {
            return $next($request);
        }

        // En cualquier otro caso, denegar acceso
        abort(403, 'Acceso denegado. No estás matriculado en este curso.');
    }



}
