<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Sktm;

class SktmAPIController extends Controller
{
    public function index($village_id, Request $request, $user_id) {
        $data = $request->all();

        $sktm = Sktm::query();

        $q = $request->query('q');

        $sktm->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $sktm = $sktm->where('village_id', $village_id)
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')->limit(30)->get();

        // $sktm = Sktm::where('village_id', $village_id)
        // ->where('user_id', $user_id)
        // ->orderBy('created_at', 'desc')->get();

        return response()->json(ApiResponse::success($sktm));
    }

    public function addSktm(Request $request, $village_id, $user_id)
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

        $data['image_ktp'] = "";
        if ($request->file('image_ktp')) {
            $data['image_ktp'] = $request->file('image_ktp')->store('sktm_ktp', 'public');
        }


        $sktm = Sktm::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "number_phone" => $request->number_phone,
            "image_ktp" => $data['image_ktp'],
            "address" => $request->address,
            "status" => "processing",
        ]);

        return response()->json(ApiResponse::success($sktm, 'Success add data'));
    }
}
