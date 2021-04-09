<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Validator;

class PositionAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $position = Position::query();

        $q = $request->query('q');

        $position->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $position = $position->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($position));
    }

    public function addPosition(Request $request, $village_id)
    {
        $rules = [
            'name'  => 'required|max:100',
        ];

        $message = [
            'name.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $position = Position::create([
            "village_id" => $village_id,
            "name" => $request->name,
        ]);

        return response()->json(ApiResponse::success($position, 'Success add data'));
    }
}
