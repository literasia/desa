<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\{Family, Citizen};


class FamilyAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $family = Family::query()->with('citizen');

        $q = $request->query('q');

        $family->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $family = $family->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();

        return response()->json(ApiResponse::success($family));
    }

    public function getGroupFamily($id, $village_id, Request $request) {
        $family = Family::findOrFail($id);
        $family_group = Citizen::where('village_id', $village_id)->where('id', '!=', $family->citizen->id)->where('no_kk', $family->citizen->no_kk)->get();
        
        return response()
        ->json(ApiResponse::success([
            'head_of_family' => $family->citizen->name,
            'family_group' => $family_group,
        ]));
    }

    public function addFamily(Request $request, $village_id)
    {
        $rules = [
            'citizen_id'  => 'required',
        ];

        $message = [
            'citizen_id.required'  => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $family = Family::create([
            "village_id" => $village_id,
            "citizen_id" => $request->citizen_id,
        ]);

        return response()->json(ApiResponse::success($family, 'Success add data'));
    }
}
