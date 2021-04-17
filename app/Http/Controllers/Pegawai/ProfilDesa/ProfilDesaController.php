<?php

namespace App\Http\Controllers\Pegawai\ProfilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VillageProfile;
use App\Models\Employee;

class ProfilDesaController extends Controller
{
    public function index() {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
    	$profile = VillageProfile::firstOrCreate(
    		// first array = where
    		['village_id'=>auth()->user()->village->id],
		);
        return view('pegawai.profil-desa.profil-desa',["employee" => $employee]);
    }
}
