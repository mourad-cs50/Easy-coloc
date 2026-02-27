<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request); 
        }

        
        abort(403, 'access denied');
    }
}