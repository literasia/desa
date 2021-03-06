<?php

namespace App\Http\Controllers\API;

use App\Models\Death;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Validator;

class DeathAPIController extends Controller
{

    public function getDeath($village_id,  Request $request)
    {
         $data = $request->all();

        $death = Death::query();

        $q = $request->query('q');

        $death->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });


        $death = $death->where('deaths.village_id', $village_id)->orderByDesc('created_at')->get();

        return response()->json(ApiResponse::success($death, 'Success get data'));
    }

    // public function addDeath(Request $request, $village_id)
    // {
    //     {
    //         $rules = [
    //             'nik' => 'required|max:16',
    //             'name'  => 'required|max:100',
    //             'deathdate' => 'required',
    //             'deadcause' => 'required',
    //             'address' => 'required',
    //         ];
    
    //         $message = [
    //             'nik.required' => 'This nik column cannot be empty',
    //             'name.required' => 'This name column cannot be empty',
    //             'deathdate.required' => 'This deathdate column cannot be empty',
    //             'deadcause.required' => 'This deadcause column cannot be empty',
    //             'address.required' => 'This address column cannot be empty',
    //         ];
    
    //         $validator = Validator::make($request->all(), $rules, $message);
    
    //         if ($validator->fails()) {
    //             return response()
    //                 ->json([
    //                     'errors' => $validator->errors()->all()
    //                 ]);
    //         }
    
    //         $death = Death::create([
    //             'village_id' => $village_id,
    //             'nik' => $request->nik,
    //             'name'  => $request->name,
    //             'deathdate' => $request->deathdate,
    //             'deadcause' => $request->deadcause,
    //             'address' => $request->address,
    //         ]);
    
    //         return response()->json(ApiResponse::success($death, 'Success add data'));
    //     }
    // }
}