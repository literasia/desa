<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

use Closure;

class pegawai
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
        $emp = Employee::where("user_id", Auth::user()->id)->first();
        $access_data = [
            "kalender" => "calendar",
            "profil-desa" => "village_profile",
            "wisata-desa" => "village_tour",
        ];

        if (Auth::user()->hasRole('employee')) {
            foreach ($access_data as $key => $value) {
                if(strrpos($request->path(), $key)){
                    if($emp->access[$value]){
                        return $next($request);
                    }else{
                        return redirect("pegawai");
                    }
                }
            }
            return $next($request);
        }

        return redirect('home');
    }
}
