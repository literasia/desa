<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Village;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ChangeProfileAdminController extends Controller
{

    public function edit()
    {
        $data = Village::select('indoregion_villages.name as desa', 'indoregion_districts.name as kecamatan', 'indoregion_regencies.name as kabupaten', 'indoregion_provinces.name as provinsi')
                    ->where('indoregion_villages.id', auth()->user()->village_id)
                    ->join('indoregion_districts', 'indoregion_villages.district_id', 'indoregion_districts.id')
                    ->join('indoregion_regencies', 'indoregion_regencies.id', 'indoregion_districts.regency_id')
                    ->join('indoregion_provinces', 'indoregion_provinces.id','indoregion_regencies.province_id')->get()[0];
        $username = auth()->user()->username;
        return response()
            ->json([
                'data' => $data,
                'username' => $username
            ]);
    }

    public function update(Request $request)
    {

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return response()
            ->json([
                'failed' => 'Data failed updated.',
                'message' => 'Password lama salah !!'
            ]);
        }
        
        if($request->password_baru !== $request->confirmation_password){
            return response()
            ->json([
                'failed' => 'Data failed updated.',
                'message' => 'Konfirmasi password tidak sesuai !!'
            ]);
        }

        $data = User::where('id', auth()->user()->id)
                ->update([
                    'password' => Hash::make($request->password_baru)
                ]);

         return response()
            ->json([
                'success' => 'Data Updated.',
                'message' => 'Password Berhasil Diubah !!'
            ]);
    }
}