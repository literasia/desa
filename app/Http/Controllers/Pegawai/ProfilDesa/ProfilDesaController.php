<?php

namespace App\Http\Controllers\Pegawai\ProfilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{VillageProfile, VillageGallery};
use App\Utils\CRUDResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfilDesaController extends Controller
{
    public function index() {

    	$profile = VillageProfile::firstOrCreate(
    		// first_array = where
    		['village_id'=>auth()->user()->village->id],
		);
        $galleries = auth()->user()->village->galleries()->get();
        return view('pegawai.profil-desa.profil-desa', compact(['profile', 'galleries']));
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
            'photo'         => $photo ?? $profile->photo,
            'embed_maps'      => $request->embed_maps
            ])
        ){
            return response()->json(CRUDResponse::successUpdate('Profil Desa'));
        }
    }

    public function addGallery(Request $request)
    {
        $village_id = auth()->user()->village_id;
        $gallery = new VillageGallery;
        $gallery->village_id = $village_id;
        $total_gallery = VillageGallery::where('village_id', $village_id);
        // dd($total_gallery->latest()->get());
        $gallery_image = "";

        if($total_gallery->count()>=6){
            return response()->json(CRUDResponse::errorMessage("Jumlah maksimal gallery adalah 6 gambar"));
        }

        if ($request->file('gallery')) {
        	$fileExtension = $request->gallery->getClientOriginalExtension();
        	$fileName = Str::slug("gallery-" . auth()->user()->village->name . "-" . date("Y-m-d-H-i-s"), '-') . "." . $fileExtension;
            $request->gallery->storeAs('public/village_galleries', $fileName);
            $gallery_image = 'village_galleries/'.$fileName;
            $gallery->image = $gallery_image;
            $gallery->order = 0;
            $gallery->save();
        }
    }

    public function deleteGallery(Request $request)
    {
        $id = $request->id;
        $gallery = VillageGallery::findOrFail($id);
        
        if(!$gallery->delete()){
            return response()->json(CRUDResponse::errorMessage('Error Server. Gagal menghapus gallery'));
        }
        if (Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        return response()->json(CRUDResponse::successDeleteNotif('Gallery'));
    }

    public function refreshGallery()
    {
        $galleries = auth()->user()->village->galleries()->get();
        
        return view('admin.profil-desa._profile-gallery', compact('galleries'));
    }
}

