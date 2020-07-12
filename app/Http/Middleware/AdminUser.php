<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminUser
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
        if($request->user()) {
            if($request->user()->role !== 'admin') {
                return redirect('/');
            }
        }
        // if (Auth::check()) {
            
        //     return redirect(RouteServiceProvider::HOME);
        // }
        return $next($request);
        
    }
}
