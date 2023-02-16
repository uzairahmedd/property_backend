<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if (Auth::check() && Auth::User()->role_id != 2) {
            if (Auth::User()->status==1) {
               return $next($request);
            }
          //  return redirect()->route('account.blocked');
           
        }else{
            return redirect()->route('login');
        } 
    }
}
