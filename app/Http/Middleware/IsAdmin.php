<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin') {
            return $next($request);
        }
        elseif (Auth::user()->role == 'user') {
            return redirect('/');
        }
        else {
            return redirect('/login');
        }
    }
}
