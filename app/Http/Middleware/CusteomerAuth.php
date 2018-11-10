<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CusteomerAuth
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

        if (Auth::guard('customer')->check() || Auth::guard()->check()) {
            return $next($request);
        }
        return redirect('customer/login');

    }
}
