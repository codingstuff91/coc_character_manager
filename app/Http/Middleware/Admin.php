<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()?->admin) {
            return $next($request);
        }

        abort(403, 'Vous n\'avez pas accès à cette partie de l\'application !');
    }
}
