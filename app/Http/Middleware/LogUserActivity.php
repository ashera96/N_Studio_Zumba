<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;


class LogUserActivity
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
        if(Auth::check()){

            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-online-'.Auth::user()->id,true,$expiresAt);



        }
        return $next($request);
    }
}

