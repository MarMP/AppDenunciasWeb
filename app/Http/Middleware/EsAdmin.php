<?php

namespace App\Http\Middleware;

use Closure;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //Si no es superAdmin que reedirija a la raíz de la página
        if (!$request->user()->esAdmin()) {
            return redirect('/');
        }
        return $next($request);
    }
}
