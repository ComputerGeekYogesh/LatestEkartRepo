<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class usrmiddleware
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
        if (Auth::check() && Auth::user()->isban )
        {
            $banned = Auth::user()->isban == "1";
            Auth::logout();

            if($banned == 1){
                $message = 'Your account is banned. Please contact administrator';
            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email'=> 'Your account is banned. Please contact administrator']);
        }
        if (Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online'.Auth::user()->id,true,$expiresAt);
        }
        return $next($request);
    }
}
