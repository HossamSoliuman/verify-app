<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAgent
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_agent) {
            return $next($request);
        }
        return redirect('/');
    }
}
