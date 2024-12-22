<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        return $next($request); // Dashboard moe vr ied available zn
    }

}