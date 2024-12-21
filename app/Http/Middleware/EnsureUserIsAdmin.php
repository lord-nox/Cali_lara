<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        // Allow unauthenticated users through (e.g., public routes like '/')
        if (!auth()->check()) {
            return $next($request);
        }

        // Restrict non-admins
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}