<?php

namespace App\Http\Middleware;

use Closure,Auth;

class admin
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
        if (Auth::user()->priv != 1) {
            return redirect('login');
        }

        return $next($request);
    }

}