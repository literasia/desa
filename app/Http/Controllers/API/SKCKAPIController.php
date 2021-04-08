<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\SKCK;
use Validator;

class SKCKAPIController extends Controller
{
    public function addSKCK(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'nik' => 'required|min:16|max:16',
            'no_phone' => 'required',
            'address' => 'required',
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:3000'],
            'status' => 'required'
        ];

        $message = [
            'name.required' => 'This column name cannot be empty',
            'nik.required' => 'This column nik cannot be empty',
            'no_phone.required' => 'This column no_phone cannot be empty',
            'address.required' => 'This column address cannot be empty',
            'image.required' => 'This column image cannot be empty',
            'status.required' => 'This column status cannot be empty',
        ];

        $data = $request->all();

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $data['image'] = null;
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('skck', 'public');
        }

        $skck = SKCK::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "nik" => $request->nik,
            "no_phone" => $request->no_phone,
            "address" => $request->address,
            "image" => $data['image'],
            "status" => $request->status
        ]);

        return response()->json(ApiResponse::success($skck, 'Success add data'));
    }
}