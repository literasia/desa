<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Models\LandCertificate;

class LandCertificateAPIController extends Controller
{
    public function index($village_id, Request $request, $user_id) {
        $data = $request->all();

        $land_certificate = LandCertificate::query();

        $q = $request->query('q');

        $land_certificate->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $land_certificate = $land_certificate->where('village_id', $village_id)->where('user_id', $user_id)->orderBy('created_at', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($land_certificate));
    }

    public function addLandCertificate(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'number_phone' => 'required|max:16',
            'address' => 'required',
        ];

        $message = [
            'name.required' => 'This name column cannot be empty',
            'number_phone.required' => 'This phone column cannot be empty',
            'address.required' => 'This address column cannot be empty',
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
            $data['image_ktp'] = $request->file('image_ktp')->store('sktm_ktp', 'public');
        }

        $land_certificate = LandCertificate::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "number_phone" => $request->number_phone,
            "address" => $request->address,
            "image_ktp" => $data['image_ktp'],
            "status" => "processing",
        ]);

        return response()->json(ApiResponse::success($land_certificate, 'Success add data'));
    }
}
