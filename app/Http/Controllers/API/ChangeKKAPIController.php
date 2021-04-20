<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use App\Models\ChangeKK;
use Validator;


class ChangeKKAPIController extends Controller
{
    public function getChangeKK($village_id)
    {
        $certificate = ChangeKK::where('change_k_k_s.village_id', $village_id)->get();

        return response()->json(ApiResponse::success($certificate, 'Success get data'));
    }
    
    public function addChangeKK(Request $request, $village_id)
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

        $data['image_ktp'] = null;
        if ($request->file('image_ktp')) {
            $data['image_ktp'] = $request->file('image_ktp')->store('change_kk_ktp', 'public');
        }

        $certificate = ChangeKK::create([
            "village_id" => $village_id,
            "name" => $request->name,
            "no_phone" => $request->no_phone,
            "address" => $request->address,
            "image_ktp" => $data['image_ktp'],
            "status" => 'processing'
        ]);

        return response()->json(ApiResponse::success($certificate, 'Success add data'));
    }
}