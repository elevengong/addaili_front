<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class AdsMemberLogin
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
        if(!$request->session()->has('adsmember'))
        {
            return redirect('/login.html');
        }
        return $next($request);

    }
}
