<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        // The pluck method retrieves all of the values for a given key:
        // dd(Auth::user()->roles());
        if(Auth::check()) {
            $adminRole = Auth::user()->roles()->pluck('name');
            if($adminRole->contains('admin')){
                return $next($request);
            }
        } 
        
        return redirect('/login');
    }
}
