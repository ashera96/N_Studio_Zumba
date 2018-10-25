<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(!$request->user()){
            return redirect('/login'); //when the admin not logged in & try to access the system via url copying
        }
        if($request->user()->checkAdmin()){
            return $next($request); //check whether the attempting user is an admin
        }
        return redirect()->back(); //if the attempting user is not an admin,redirect back to current page
    }
}
