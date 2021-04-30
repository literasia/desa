<?php

namespace App\Http\Controllers\Pegawai\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use App\Models\Employee;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index() {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        return view('pegawai.peristiwa.kematian', ["employee"=>$employee]);
    }
}
