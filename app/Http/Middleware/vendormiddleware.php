<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class vendormiddleware
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
        if (Auth::user()->role_as == 'vendor')
        {
            return $next ($request);
        }
         return redirect('/home')->with ('status','You are not allowed to access the vendor dashboard');
     }
    }

