<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Check is user have session
 */
final class CheckUserSession
{

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user')) {
            // user value cannot be found in session
            return redirect('/');
        }

        return $next($request);
    }

}
