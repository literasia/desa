<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use App\Models\Admin\Complaint;
use Validator;

class ComplaintAPIController extends Controller
{
    public function addComplaint(Request $request, $village_id, $user_id)
    {
        $rules = [
            'name'  => 'required|max:100',
            'nik' => 'required|min:16|max:16',
            'no_phone' => 'required',
            'address' => 'required',
            'complaint_type' => 'required',
            'complaint_message' => 'required'
        ];

        $message = [
            'name.required' => 'This column cannot be empty',
            'nik.required' => 'This column cannot be empty',
            'no_phone.required' => 'This column cannot be empty',
            'address.required' => 'This column cannot be empty',
            'complaint_type.required' => 'This column cannot be empty',
            'complaint_message.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $complaint = Complaint::create([
            "user_id" => $user_id,
            "village_id" => $village_id,
            "name" => $request->name,
            "nik" => $request->nik,
            "no_phone" => $request->no_phone,
            "address" => $request->address,
            "complaint_type" => $request->complaint_type,
            "complaint_message" => $request->complaint_message
        ]);

        return response()->json(ApiResponse::success($complaint, 'Success add data'));
    }
}