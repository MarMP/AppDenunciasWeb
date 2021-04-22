<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next) {
        //$user = Auth::user();
        //Si no es superAdmin que reedirija a la raíz de la página
        if (! $request->user()->esSuperAdmin()) {
            return redirect('/');
        }
        return $next($request);
    }

}
