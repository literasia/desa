<?php

namespace App\Http\Controllers\Admin\ProfilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VillageProfile;

class ProfilDesaController extends Controller
{
    public function index() {
    	$profile = VillageProfile::firstOrCreate(
    		// first array = where
    		['id'=>auth()->user()->village->id],
    		['']
    	)
        return view('admin.profil-desa.profil-desa');
    }
}
