<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class Employer
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
        if(Auth::check()&&Auth::user()->user_type==User::TYPE_RECRUITER){
            return $next($request);

        }else{
             return redirect('/');
        }
    }
}
