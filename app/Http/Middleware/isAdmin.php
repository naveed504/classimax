<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(auth()->user() && auth()->user()->is_admin == 1){
            // dd('working');
        if(auth()->user() && auth()->user()->hasAnyRole(['user', 'Admin'])){
            return $next($request);
        }
        return redirect('/')->with('error',"You dont have admin access.");
    }
}
