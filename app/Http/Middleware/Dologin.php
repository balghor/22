<?php

namespace App\Http\Middleware;

use Closure;

class Dologin
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
        if(session()->has("UserData")) {
            return $next($request);
        }else{
            return redirect()->route("show_login")->with("error","ابتدا لاگین نمایید")->send();
        }
    }
}
