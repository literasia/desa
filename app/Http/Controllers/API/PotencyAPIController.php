<?php

namespace App\Http\Controllers\API;

use App\Models\Potency;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Validator;

class PotencyAPIController extends Controller
{

    public function getPotency($village_id,$user_id)
    {
        $potency = Potency::where('potencies.user_id', $user_id)->where('potencies.village_id', $village_id)->orderByDesc('created_at')->get();

        return response()->json(ApiResponse::success($potency, 'Success get data'));
    }

    public function addPotency(Request $request, $village_id,$user_id)
    {
        {
            $rules = [
                'business_name'  => 'required|max:100',
                'business_category' => 'required',
                'business_type' => 'required',
                'business_owner' => 'required',
                'business_address' => 'required',
                'no_phone' => 'required',
                'no_whatsapp' => 'required',
                'image_ktp' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000'],
            ];
    
            $message = [
                'business_name.required' => 'This name column cannot be empty',
                'business_category.required' => 'This category column cannot be empty',
                'business_type.required' => 'This type column cannot be empty',
                'business_owner.required' => 'This owner column cannot be empty',
                'business_address.required' => 'This address column cannot be empty',
                'no_phone.required' => 'This phone column cannot be empty',
                'no_whatsapp.required' => 'This whatsapp column cannot be empty',
                'image_ktp.required' => 'This image column cannot be empty',
            ];
    
            $validator = Validator::make($request->all(), $rules, $message);
    
            if ($validator->fails()) {
                return response()
                    ->json([
                        'errors' => $validator->errors()->all()
                    ]);
            }

            $data['image_ktp'] = null;
            if ($request->file('image_ktp')) {
                $data['image_ktp'] = $request->file('image_ktp')->store('potensi_ktp', 'public');
            }
    
            $potency = Potency::create([
                'village_id' => $village_id,
                'user_id' => $user_id,
                'business_name'  => $request->business_name,
                'business_category' => $request->business_category,
                'business_type' => $request->business_type,
                'business_owner' => $request->business_owner,
                'business_address' => $request->business_address,
                'no_phone' => $request->no_phone,
                'no_whatsapp' => $request->no_whatsapp,
                'image_ktp' => $data['image_ktp'],
                'status' => 'inactive'
            ]);
    
            return response()->json(ApiResponse::success($potency, 'Success add data'));
        }
    }
}