<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class MemberLogin
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
        if(!$request->session()->has('member'))
        {
            return redirect('/login');
        }
        return $next($request);

    }
}
