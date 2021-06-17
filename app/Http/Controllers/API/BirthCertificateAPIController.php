<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Models\BirthCertificate;

class BirthCertificateAPIController extends Controller
{
    public function index($village_id, Request $request, $user_id) {
        $data = $request->all();

        $birth_certificate = BirthCertificate::query();

        $q = $request->query('q');

        $birth_certificate->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $birth_certificate = $birth_certificate->where('village_id', $village_id)
                            ->where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')->get();

        return response()->json(ApiResponse::success($birth_certificate));
    }

    public function addBirthCertificate(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'phone_number' => 'required|max:16',
            'address' => 'required',
            'image_ktp' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000'],
        ];

        $message = [
            'name.required' => 'This name column cannot be empty',
            'phone_number.required' => 'This phone column cannot be empty',
            'address.required' => 'This address column cannot be empty',
            'image_ktp.required' => 'This image column cannot be empty'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $data['image_ktp'] = null;
        if ($request->file('image_ktp')) {
            $data['image_ktp'] = $request->file('image_ktp')->store('birth_certificate_ktp', 'public');
        }

        $birth_certificate = BirthCertificate::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "image_ktp" => $data['image_ktp'] ?? "",
            "status" => 'processing',
        ]);

        return response()->json(ApiResponse::success($birth_certificate, 'Success add data'));
    }
}
