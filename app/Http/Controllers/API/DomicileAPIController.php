<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\Domicile;
use Validator;

class DomicileAPIController extends Controller
{

    public function getDomicile($village_id,Request $req, $user_id) {
        $data = $req->all();

        $domisili =Domicile::query();

        $q = $req->query('q');
        $domisili->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $domisili = $domisili->where('village_id', $village_id)->where('user_id', $user_id)->get();
        return response()->json(ApiResponse::success($domisili));
    }

    public function addDomicile(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'nik' => 'required|min:16|max:16',
            'no_phone' => 'required',
            'address' => 'required',
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:3000'],
        ];

        $message = [
            'name.required' => 'This column name cannot be empty',
            'nik.required' => 'This column nik cannot be empty',
            'no_phone.required' => 'This column no_phone cannot be empty',
            'address.required' => 'This column address cannot be empty',
            'image.required' => 'This column image cannot be empty',
        ];

        $data = $request->all();

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $data['image'] = "";
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('domisili', 'public');
        }

        $domisili = Domicile::create([
         
            "village_id" => $village_id,
            "user_id" => $user_id,
            "name" => $request->name,
            "nik" => $request->nik,
            "no_phone" => $request->no_phone,
            "address" => $request->address,
            "image" => $data['image'],
            "status" => "processing"
        ]);

        return response()->json(ApiResponse::success($domisili, 'Success add data'));
    }
}