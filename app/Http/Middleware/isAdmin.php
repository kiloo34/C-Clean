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
        if( $request->user()->role == "2" || $request->user()->role == "3" ){
            return $next($request);
        } 
        // else {
        //     return redirect('/');
        // }
        // return redirect('/');
        // return $next($request);
        return abort(403);
    }
}
