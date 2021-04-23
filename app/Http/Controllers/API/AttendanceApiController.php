<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\VillageProfile;

class AttendanceApiController extends Controller
{
    public function getAttendance(Request $request, $village_id,$month,$year){
        $nextMonth = $month+1;
        $m = $year."-".$month."-1";
        $mn = $year."-".$nextMonth."-1";
        $inData = ["thisMonth"=>$m, "nextMonth" => $mn];
        $data = Employee::with(["attendances" => function($q) use($inData)  {
            $q->where("date_attendance", ">=" , $inData["thisMonth"])
              ->where("date_attendance", "<=" , $inData["nextMonth"]);
        }])
        ->where("village_id", $village_id)
        ->orderBy("name")
        ->get();
        return response()->json($data, 200);
    }

    public function addAttendance(Request $request, $employee_id){
        $rules = [
            'date_attendance' => 'required|date',
            'status' => 'required',
            'editor_id' => 'required',
            'village_id' => 'required',
        ];

        $message= [
            'date_attendance.required' => 'date_attendance column cannot be empty',
            'village_id.required' => 'village_id column cannot be empty',
            'editor_id.required' => 'editor_id column cannot be empty',
            'date_attendance.date' => 'date_attendance column must be date type, ex: 2021-1-23',
            'status.required' => 'status column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $body = $request->all();
        $obj = Attendance::create([
            'village_id' => $body["village_id"],
            'date_attendance' => $body["date_attendance"],
            'employee_id' => $employee_id,
            'status' => $body["status"],
            'editor_id' => $body["editor_id"]
        ]);


        $data = [
            "message" => "Succes add attendance",
            "data" => $obj,
        ];
        return response()->json($data, 200);
    }
}
