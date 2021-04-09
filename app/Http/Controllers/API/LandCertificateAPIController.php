<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Models\LandCertificate;

class LandCertificateAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $land_certificate = LandCertificate::query();

        $q = $request->query('q');

        $land_certificate->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $land_certificate = $land_certificate->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($land_certificate));
    }

    public function addLandCertificate(Request $request, $village_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'phone_number' => 'required|max:16',
            'address' => 'required',
            'status' => 'required',
        ];

        $message = [
            'name.required' => 'This column cannot be empty',
            'phone_number.required' => 'This column cannot be empty',
            'address.required' => 'This column cannot be empty',
            'status.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $land_certificate = LandCertificate::create([
            "village_id" => $village_id,
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "status" => $request->status,
        ]);

        return response()->json(ApiResponse::success($land_certificate, 'Success add data'));
    }
}
