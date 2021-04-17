<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class EmployeeAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $employee = Employee::query();

        $q = $request->query('q');

        // $employee->when($q, function($query) use ($q) {
        //     return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        // });

        $employee = $employee->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($employee));
    }

    public function addEmployee(Request $request, $village_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'nik' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];

        $message = [
            'name.required' => 'This column cannot be empty',
            'nik.required' => 'This column cannot be empty',
            'nip.required' => 'This column cannot be empty',
            'address.required' => 'This column cannot be empty',
            'username.required' => 'This column cannot be empty',
            'password.required' => 'This column cannot be empty',
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
            $photo = $request->file('photo')->store('pegawai', 'public');
        }

        $employee = Employee::create([
            "village_id" => $village_id,
            "name" => $request->name,
            "nik" => $request->nik,
            "nip" => $request->nip,
            "address" => $request->address,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "photo" => $photo
        ]);

        return response()->json(ApiResponse::success($employee, 'Success add data'));
    }
}
