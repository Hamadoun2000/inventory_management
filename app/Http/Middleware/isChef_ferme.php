<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isChef_ferme
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roleUtilisateur->nom_role === 'Chef_ferme') {
            return $next($request);
        }

        abort(403, 'Accès interdit.');
    }
}
