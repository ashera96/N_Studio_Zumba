<?php

namespace App\Http\Middleware;

use Closure;

class IsReceptionist
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
            return redirect('/login'); //when the receptionist not logged in & try to access the system via url copying
        }
        if($request->user()->checkReceptionist()){
            return $next($request); //check whether the attempting user is a receptionist
        }
        return redirect()->back(); //if the attempting user is not a receptionist,redirect back to current page
    }

}
