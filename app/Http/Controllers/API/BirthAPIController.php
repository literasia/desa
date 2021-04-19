<?php

namespace App\Http\Controllers\API;

use App\Models\Birth;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Validator;

class BirthAPIController extends Controller
{

    public function getBirth($village_id)
    {
        $birth = Birth::where('births.village_id', $village_id)->get();

        return response()->json(ApiResponse::success($birth, 'Success get data'));
    }

    public function addBirth(Request $request, $village_id)
    {
        {
            $rules = [
                'name'  => 'required|max:100',
                'birthplace' => 'required',
                'birthdate' => 'required',
                'gender' => 'required',
                'religion' => 'required',
                'address' => 'required',
                'dadname' => 'required',
                'momname' => 'required',
            ];
    
            $message = [
                'name.required' => 'This name column cannot be empty',
                'birthplace.required' => 'This birthplace column cannot be empty',
                'birthdate.required' => 'This birthdate column cannot be empty',
                'gender.required' => 'This gender column cannot be empty',
                'religion.required' => 'This religion column cannot be empty',
                'address.required' => 'This address column cannot be empty',
                'dadname.required' => 'This dadname column cannot be empty',
                'momname.required' => 'This momname column cannot be empty',
            ];
    
            $validator = Validator::make($request->all(), $rules, $message);
    
            if ($validator->fails()) {
                return response()
                    ->json([
                        'errors' => $validator->errors()->all()
                    ]);
            }
    
            $birth = Birth::create([
                'village_id' => $village_id,
                'name'  => $request->name,
                'birthplace' => $request->birthplace,
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'address' => $request->address,
                'dadname' => $request->dadname,
                'momname' => $request->momname,
            ]);
    
            return response()->json(ApiResponse::success($birth, 'Success add data'));
        }
    }
}