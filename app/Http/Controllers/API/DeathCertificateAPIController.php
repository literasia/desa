<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use App\Models\DeathCertificate;
use Validator;


class DeathCertificateAPIController extends Controller
{
    public function getDeathCertificate($village_id, $user_id)
    {
        $certificate = DeathCertificate::where('death_certificates.village_id', $village_id)
                        ->where('user_id', $user_id)
                        ->orderByDesc('created_at')->get();

        return response()->json(ApiResponse::success($certificate, 'Success get data'));
    }
    
    public function addDeathCertificate(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'no_phone' => 'required',
            'address' => 'required',
            'image_ktp' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000'],
        ];

        $message = [
            'name.required' => 'This name column cannot be empty',
            'no_phone.required' => 'This phone column cannot be empty',
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

        $data['image_ktp'] = "";
        if ($request->file('image_ktp')) {
            $data['image_ktp'] = $request->file('image_ktp')->store('death_certificate_ktp', 'public');
        }

        $certificate = DeathCertificate::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "no_phone" => $request->no_phone,
            "address" => $request->address,
            "image_ktp" => $data['image_ktp'] ?? "",
            "status" => 'processing'
        ]);

        return response()->json(ApiResponse::success($certificate, 'Success add data'));
    }
}