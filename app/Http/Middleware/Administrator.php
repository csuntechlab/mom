<?php

namespace Mom\Http\Middleware;

use Auth;
use Closure;

use Mom\Exceptions\PermissionDeniedException;

class Administrator
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
        if(!Auth::check() || !Auth::user()->hasRole('admin')) {
            throw new PermissionDeniedException();
        }

        return $next($request);
    }
}
