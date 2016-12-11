<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class IsUserDataEntry
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
        if(Auth::user()->isadmin == 0){
             return redirect('/');
        }
        return $next($request);
    }
}
