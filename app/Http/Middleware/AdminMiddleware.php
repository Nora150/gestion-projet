<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Utilisez $request->user() pour accéder à l'utilisateur connecté
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // Redirigez ou interrompez si l'utilisateur n'est pas un administrateur
        return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
    }
}
