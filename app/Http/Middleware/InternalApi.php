<?php

namespace App\Http\Middleware;

use Closure;

class InternalApi
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
        if (!$request->wantsJson()) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
