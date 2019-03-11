<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(! isset($_COOKIE['access_token']))
            abort(403, 'Unauthorized action.');
        elseif($request->headers->has('Authorization') && $request->header('Authorization') != $_COOKIE['access_token'] )
            abort(403, 'Unauthorized action.');
        return $next($request);
    }
}
