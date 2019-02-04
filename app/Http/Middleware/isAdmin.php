<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
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
        if (Auth::check()) {
            if( $request->user()->role->nama == "member" ){
                return redirect('/');   
            } 
            return $next($request);
        }
        return redirect(404);
        Auth::login();
    }
}
