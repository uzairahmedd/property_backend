<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthorMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->status==1) {
                return $next($request);
            }
            elseif (Auth::user()->status==2) {
               return redirect()->route('account.pending');
            }
            return redirect()->route('account.blocked');
           
        }else{
            return redirect()->route('login');
        } 
    }
}
