<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\{Citizen, Family};
use App\{User, Role};
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CitizenAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $citizen = Citizen::query();

        $q = $request->query('q');

        $citizen->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $citizen = $citizen->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();

        return response()->json(ApiResponse::success($citizen));
    }

    public function addCitizen(Request $request)
    {
        $rules = [
            'name'  => 'required|max:100',
            'no_kk' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'citizenship' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'sex' => 'required',
            'religion' => 'required',
            'education' => 'required',
            'marital_status' => 'required',
            'family_status' => 'required',
            'work_type' => 'required',
            'village_id' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'is_head_of_family' => 'required',
        ];

        $message = [
            'name.required'  => 'This column cannot be empty',
            'no_kk.required' => 'This column cannot be empty',
            'nik.required' => 'This column cannot be empty',
            'email.required' => 'This column cannot be empty',
            'phone.required' => 'This column cannot be empty',
            'citizenship.required' => 'This column cannot be empty',
            'place_of_birth.required' => 'This column cannot be empty',
            'date_of_birth.required' => 'This column cannot be empty',
            'sex.required' => 'This column cannot be empty',
            'religion.required' => 'This column cannot be empty',
            'education.required' => 'This column cannot be empty',
            'marital_status.required' => 'This column cannot be empty',
            'family_status.required' => 'This column cannot be empty',
            'work_type.required' => 'This column cannot be empty',
            'village_id.required' => 'This column cannot be empty',
            'province_id.required' => 'This column cannot be empty',
            'regency_id.required' => 'This column cannot be empty',
            'district_id.required' => 'This column cannot be empty',
            'address.required' => 'This column cannot be empty',
            'is_head_of_family.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        // kalau input photo tidak diisi
        $photo = NULL;

        // jika file photo diisi
        if ($request->file('photo')) {
            // jika file photo yang lama ada di folder public maka photo nya dihapus
            if (Storage::disk('public')->exists($request->photo)) {
                Storage::disk('public')->delete($request->photo);
            }
            // ganti dengan photo baru yang telah diinput 
            $photo = $request->file('photo')->store('penduduk', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'username' => str_replace(' ', '_', strtolower($request->username)),
            'email' => $request->email,
            'password' => hash::make($request->password),
            'village_id' => $request->village_id,
        ]);
            
        $user_id = User::findOrFail($user->id);

        // get Roles to attach user roles
        $role = Role::where('name', 'user')->first();

        // attach
        $user_id->roles()->attach($role->id);

        $citizen = Citizen::create([
            "village_id" => $request->village_id,
            "name" => $request->name,
            "user_id" => $user->id,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'email' => $request->email,
            'phone' => $request->phone,
            'citizenship' => $request->citizenship,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'sex' => $request->sex,
            'religion' => $request->religion,
            'education' => $request->education,
            'marital_status' => $request->marital_status,
            'family_status' => $request->family_status,
            'work_type' => $request->work_type,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'address' => $request->address,
            'is_head_of_family' => $request->is_head_of_family,
            'photo' => $photo,
        ]);

        
        // jika status kepala keluarga
        if ($request->is_head_of_family) {
            Family::create([
                'village_id' => $request->village_id,
                'citizen_id' => $citizen->id
            ]);
        }

        return response()->json(ApiResponse::success($citizen, 'Success add data'));
    }


    public function edit($user_id)
    {
        $citizen = Citizen::where('user_id', $user_id)->get();

        return response()->json(ApiResponse::success($citizen,'Success get data'));
    }


    public function update($user_id, Request $request)
    {
        // $rules = [
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'citizenship' => 'required',
        //     'place_of_birth' => 'required',
        //     'date_of_birth' => 'required',
        //     'sex' => 'required',
        //     'religion' => 'required',
        //     'education' => 'required',
        //     'marital_status' => 'required',
        //     'family_status' => 'required',
        //     'work_type' => 'required',
        //     'address' => 'required',
        // ];


        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return response()
        //         ->json([
        //             'errors' => $validator->errors()->all()
        //         ]);
        // }

        $citizen = Citizen::where('user_id',$user_id)->get();

        $data['photo'] = null;
        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('penduduk', 'public');
        }
       

        $citizenData = Citizen::where('user_id',$user_id)->update([
            'phone' => $request->phone,
            'citizenship' => $request->citizenship,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'sex' => $request->sex,
            'religion' => $request->religion,
            'education' => $request->education,
            'marital_status' => $request->marital_status,
            'family_status' => $request->family_status,
            'work_type' => $request->work_type,
            'address' => $request->address,
            'photo' => $data['photo']
        ]);


        if ($request->file('photo') && $citizen[0]->photo && Storage::disk('public')->exists($citizen[0]->photo)) {
            Storage::disk('public')->delete($citizen[0]->photo);
        }

        return response()->json(ApiResponse::success($citizenData, 'Success update data'));

    }

    public function changePass($user_id, Request $request)
    {

        $user = User::whereId($user_id)->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(ApiResponse::success($user, 'Success update password'));

    }
}
