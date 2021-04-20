<?php

namespace App\Http\Controllers\Admin\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\VillageProfile;

class AbsensiPegawaiController extends Controller
{
    public function index(Request $request) {
        $village = VillageProfile::where("village_id", auth()->user()->village_id)->first();
        $data = [];
        if($request->req == "table"){
            $data = Employee::with(["attendance" => function($q) use($request) {
                $q->where("date_attendance", $request->tanggal)->where("village_id",$request->village_id);
            }])
            ->where("village_id", $request->village_id)
            ->orderBy("name")
            ->get();

            $employees = Employee::where("village_id", $request->village_id)->get();
        }

        return view('admin.absensi.pegawai', compact("village","data"));
    }

    public function write(Request $request) {
        if($request->req == 'write') {
            $this->validate($request, [
                'tanggal' => 'required|date',
                'village_id' => 'required',
                'employee_id' => 'required',
                'status' => 'required'
            ]);

            $obj = Attendance::create([
                'village_id' => $request->village_id,
                'date_attendance' => $request->tanggal,
                'employee_id' => $request->employee_id,
                'status' => $request->status,
                'editor_id' => $request->user()->id
            ]);

            return response()->json($obj);
        }
    }
}
