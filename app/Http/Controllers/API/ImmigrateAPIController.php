<?php

namespace App\Http\Controllers\API;

use App\Models\Immigrate;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Validator;

class ImmigrateAPIController extends Controller
{

    public function getImmigrate($village_id)
    {
        $immigrate = Immigrate::where('immigrates.village_id', $village_id)->get();

        return response()->json(ApiResponse::success($immigrate, 'Success get data'));
    }

    // public function addImmigrate(Request $request, $village_id)
    // {
    //     {
    //         $rules = [
    //             'nik' => 'required|max:16',
    //             'name'  => 'required|max:100',
    //             'address' => 'required',
    //             'newaddress' => 'required',
    //             'information' => 'required',
    //         ];
    
    //         $message = [
    //             'nik.required' => 'This nik column cannot be empty',
    //             'name.required' => 'This name column cannot be empty',
    //             'address.required' => 'This address column cannot be empty',
    //             'newaddress.required' => 'This newa ddress column cannot be empty',
    //             'information.required' => 'This information column cannot be empty',
    //         ];
    
    //         $validator = Validator::make($request->all(), $rules, $message);
    
    //         if ($validator->fails()) {
    //             return response()
    //                 ->json([
    //                     'errors' => $validator->errors()->all()
    //                 ]);
    //         }
    
    //         $immigrate = Immigrate::create([
    //             'village_id' => $village_id,
    //             'nik' => $request->nik,
    //             'name'  => $request->name,
    //             'address' => $request->address,
    //             'newaddress' => $request->newaddress,
    //             'information' => $request->information,
    //         ]);
    
    //         return response()->json(ApiResponse::success($immigrate, 'Success add data'));
    //     }
    // }
}