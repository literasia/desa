<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        if (Auth::user()->hasRole('admin')) {
            $this->redirectTo = route('admin.index');
            return $this->redirectTo;
        } else if (Auth::user()->hasRole('superadmin')) {
            $this->redirectTo = route('superadmin.index');
            return $this->redirectTo;
        }else if(Auth::user()->hasRole('employee')){
            $this->redirectTo = route('pegawai.index');
            return $this->redirectTo;
        } else {
            $this->redirectTo = route('auth.login');
            return $this->redirectTo;
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

    public function username() {
        return 'username';
    }
}
