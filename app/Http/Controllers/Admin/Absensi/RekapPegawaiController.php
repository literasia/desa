<?php

namespace App\Http\Controllers\Admin\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Employee;
use App\Models\VillageProfile;

class RekapPegawaiController extends Controller
{
    public function index(Request $request) {
        $village = VillageProfile::where("village_id", auth()->user()->village_id)->first();
        $data = [];
        if($request->req == "table"){
            $data = Employee::with(["attendances" => function($q) use($request) {
                $q->where("date_attendance", ">=" , $request->tanggal_mulai)
                  ->where("date_attendance", "<=" , $request->tanggal_selesai)
                  ->where("village_id",$request->village_id);
            }])
            ->where("village_id", $request->village_id)
            ->orderBy("name")
            ->get();

        }
        return view('admin.absensi.rekap-pegawai', compact("village","data"));
    }
}
