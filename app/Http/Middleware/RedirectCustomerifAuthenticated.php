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
    public function handle($request, Closure $next, $guard = 'customer')
    {
      if ( Auth::guard('web')->check()) {
        return redirect('/customer');
      }
      if (Auth::guard('customer')->check())
      {
          return redirect('customer/'.Auth::guard('customer')->user()->id);
      }
      return $next($request);

    }
}
