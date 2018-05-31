<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Lang;
use Event;

class Admin
{
    
    protected $redirectTo = 'home';
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }

        return redirect( $this->redirectTo );
    }
}
