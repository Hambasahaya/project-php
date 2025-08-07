<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Rolecheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $level): Response
    {
        if (Auth::check() && Auth::user()->level !== $level) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
