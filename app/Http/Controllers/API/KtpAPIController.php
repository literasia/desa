<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ktp;
use App\Utils\ApiResponse;

class KtpAPIController extends Controller
{
    public function index($village_id, Request $request, $user_id) {
        $data = $request->all();

        $ktp = Ktp::query();

        $q = $request->query('q');

        $ktp->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $ktp = $ktp->where('village_id', $village_id)
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')->limit(30)->get();
        // $ktp = Ktp::where('village_id', $village_id)
        // ->where('user_id', $user_id)
        // ->orderBy('created_at', 'desc')->get();

        return response()->json(ApiResponse::success($ktp));
    }

    public function addKtp(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'number_phone' => 'required|max:16',
            'address' => 'required',
        ];

        $message = [
            'name.required' => 'This column cannot be empty',
            'number_phone.required' => 'This column cannot be empty',
            'address.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        
        $data['kk_image'] = "";
        if ($request->file('kk_image')) {
            $data['kk_image'] = $request->file('kk_image')->store('add_ktp', 'public');
        }

        $ktp = Ktp::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "number_phone" => $request->number_phone,
            "address" => $request->address,
            "kk_image" => $data['kk_image'] ?? "",
            "status" => "processing",
        ]);

        return response()->json(ApiResponse::success($ktp, 'Success add data'));
    }
}
