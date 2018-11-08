<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectCustomerifAuthenticated
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
      // dd(Auth::guard('customer')->check());
        if (Auth::guard('customer')->check()) {
          return redirect('/home');
        }
        
        return $next($request);
    }
}
