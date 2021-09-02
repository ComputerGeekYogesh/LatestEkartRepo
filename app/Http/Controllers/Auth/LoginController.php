<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    // public function redirectTo()
    // {
    //     if(Auth::user()->role_as == 'admin') // for admin login
    //     {
    //       return 'dashboard';
    //     }
    //     if(Auth::user()->role_as == 'vendor') // for vendor login
    //     {
    //       return 'vendor-dashboard';
    //     }
    //     if(Auth::user()->role_as == 'NULL') // normal user login
    //     {
    //       return 'home';

    //     }
    // }

    public function authenticated()
    {
        if(Auth::user()->role_as == 'admin') // for admin login
        {
          return redirect('dashboard')->with('status','Welcome to Dashboard');
        }
        elseif(Auth::user()->role_as == 'vendor') // for vendor login
        {
          return redirect('vendor-dashboard')->with('status','Welcome to Dashboard');
        }
        elseif(Auth::user()->role_as == NULL) // normal user login
        {
          return redirect()->back()->with('status','You are successfully logged in');

        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
