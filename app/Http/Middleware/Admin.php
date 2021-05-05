<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Addon;

class Admin
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
        $addon = Addon::where("admin_id", Auth::user()->id)->first();
        $access_data = [
            "data-penduduk" => "population_data",
            "profil-desa" => "village_profile",
            "administrasi" => "administration",
            "struktur" => "village_structure",
            "wisata-desa" => "village_tour",
            "potensi" => "village_potency",
            "pengumuman" => "announcement",
            "perpustakaan" => "library",
            "pengaduan" => "complaint",
            "kalender" => "calendar",
            "kampanye" => "campaign",
            "peristiwa" => "event",
            "slider" => "slider",
            "berita" => "news",
            "absensi" => "attendance",
            "___" => "finance",
            "___" => "guest_book",
        ];

        if (Auth::user()->hasRole('admin')) {
            foreach ($access_data as $key => $value) {
                if(strrpos($request->path(), $key)){
                    if($addon[$value]){
                        return $next($request);
                    }else{
                        return redirect("admin");
                    }
                }
            }
            return $next($request);
        }

        return redirect('home');
    }
}
