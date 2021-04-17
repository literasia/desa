<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Models\BusinessPermits;
use Illuminate\Support\Facades\Validator;

class BusinessPermitsAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $business_permits = BusinessPermits::query();

        $q = $request->query('q');

        $business_permits->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $business_permits = $business_permits->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($business_permits));
    }

    public function addBusinessPermits(Request $request, $village_id)
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

        $business_permits = BusinessPermits::create([
            "village_id" => $village_id,
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "status" => $request->status,
        ]);

        return response()->json(ApiResponse::success($business_permits, 'Success add data'));
    }
}
