<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use App\Models\VillageStructure;

class VillageStructureAPIController extends Controller
{
    public function index($village_id, Request $request) {
        $data = $request->all();

        $village_structures = VillageStructure::query()->with('employee')->with('position');

        $q = $request->query('q');

        $village_structures->whereHas('employee', function($query) use($q){
            return $query->where('name', 'LIKE', '%'.strtolower($q).'%');
        });

        $village_structures = $village_structures->where('village_id', $village_id)->orderBy('created_at', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($village_structures));
    }

    public function addVillageStructure(Request $request, $village_id, $user_id)
    {
        $rules = [
            'employee_id'  => 'required',
            'position_id' => 'required',
            'level' => 'required',
            'status' => 'required',
            'description' => 'required',
        ];

        $message = [
            'name.required' => 'This column cannot be empty',
            'employee_id.required' => 'This column cannot be empty',
            'position_id.required' => 'This column cannot be empty',
            'level.required' => 'This column cannot be empty',
            'status.required' => 'This column cannot be empty',
            'description.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $village_structures = VillageStructure::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "employee_id" => $request->employee_id,
            "position_id" => $request->position_id,
            "level" => $request->level,
            "status" => $request->status,
            "description" => $request->description,
            "parent_id" => $request->parent_id
        ]);

        return response()->json(ApiResponse::success($village_structures, 'Success add data'));
    }
}
