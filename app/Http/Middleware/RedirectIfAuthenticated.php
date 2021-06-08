<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
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
                return abort('403');
            }
        }

        return $next($request);
    }
}
