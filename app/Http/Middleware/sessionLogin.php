<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class sessionLogin
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

        if(!Session::get('login')){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
