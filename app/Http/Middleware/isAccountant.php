<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAccountant
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roleUtilisateur->nom_role === 'Comptable') {
            return $next($request);
        }

        abort(403, 'Accès interdit.');
    }
}
