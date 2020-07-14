<?php

namespace App\Http\Middleware;

use Closure;

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
        if (Auth::guard($guard)->check()) {
            return redirect()->intended('/');
        }

        // if (!auth()->user()){
        //     return redirect()->back();
        // }
        
        if (!auth()->user()->admin){
            return redirect('/');
        }

        return $next($request);
    }
}
