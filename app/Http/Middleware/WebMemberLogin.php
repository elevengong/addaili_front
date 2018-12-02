<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class WebMemberLogin
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
        if(!$request->session()->has('webmember'))
        {
            return redirect('/login.html');
        }
        return $next($request);

    }
}
