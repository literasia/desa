<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Models\{Citizen, UserAccess, Family};
use App\Utils\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Validator};
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    public function userLogin(Request $req) {
        $data = $req->all();

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(ApiResponse::validationError($validator->errors()));
        }

        $fieldType = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!Auth::attempt([$fieldType => $data['username'], 'password' => $data['password']])) {
            return response()->json(ApiResponse::error('username dan password tidak ditemukan/sesuai'));
        }

        $user = Auth::user();

        return response()->json(ApiResponse::success($user));
    }

    public function userRegister(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name'      => 'required',
            'nik'       => 'required',
            'no_kk'     => 'required',
            'email'     => 'required|email',
            'phone'     => 'required|numeric',
            'password'  => 'required',
            'village_id'=> 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(ApiResponse::validationError($validator->errors()));
        }

        try{
            $user = User::create([
                'village_id'    => $request->village_id,
                'name'          => $request->name,
                'username'      => $request->nik,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
            ]);
        } catch(QueryException $exception){
            return response()->json(ApiResponse::error($exception));
        }

        $check = Citizen::where('nik', $request->nik)->get();

        if($check->count()){
            return response()->json(ApiResponse::error("Nik Sudah digunakan!!"));
        }
        
        try{
           $citizen = Citizen::create([
                'user_id'       => $user->id,
                'no_kk'         => $request->no_kk,
                'nik'           => $request->nik,
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'sex'           => $request->sex,
                'is_head_of_family'           => $request->is_head_of_family,
                'province_id'   => $user->village->district->regency->province->id,
                'regency_id'    => $user->village->district->regency->id,
                'district_id'   => $user->village->district->id,
                'village_id'    => $user->village->id,
            ]);
        } catch(QueryException $exception){
            return response()->json(ApiResponse::error($exception));
        }

         // jika status kepala keluarga
        if ($request->is_head_of_family) {
            Family::create([
                'village_id' => $request->village_id,
                'citizen_id' => $citizen->id
            ]);
        }

        try{
            UserAccess::create([
                'user_id'       => $user->id,
                'village_id'    => $user->village->id,
            ]);
        } catch(QueryException $exception){
            return response()->json(ApiResponse::error($exception));
        }
        
        return response()->json(ApiResponse::success($user));
    }
}
