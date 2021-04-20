<?php

namespace App\Http\Controllers\Admin\ProfilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{VillageProfile, VillageGallery};
use App\Utils\CRUDResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;


class ProfilDesaController extends Controller
{
    public function index() {

    	$profile = VillageProfile::firstOrCreate(
    		// first array = where
    		['village_id'=>auth()->user()->village->id],
		);
        return view('admin.profil-desa.profil-desa', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $photo = null;
        $village_id = auth()->user()->village_id;
        $profile = VillageProfile::where('village_id', $village_id)->first();

        if ($request->file('photo')) {
        	$fileExtension = $request->photo->getClientOriginalExtension();
        	$fileName = Str::slug(auth()->user()->village->name . "-" . date("Y-m-d-H-i-s"), '-') . "." . $fileExtension;
            $request->photo->storeAs('public/village_profile', $fileName);
            $photo = 'village_profile/'.$fileName;
        }

        if ($request->file('photo') && $profile->photo && Storage::disk('public')->exists($profile->photo)) {
            Storage::disk('public')->delete($profile->photo);
        }

        if(
            VillageProfile::where('village_id', $village_id)->update([
            'village_chief' => $request->village_chief,
            'phone_number'  => $request->phone_number,
            'address'       => $request->address,
            'description'   => $request->description,
            'photo'         => $photo ?? $profile->photo
            ])
        ){
            return response()->json(CRUDResponse::successUpdate('Profil Desa'));
        }
    }

    public function updateGallery(Request $request)
    {
        
    }
}
