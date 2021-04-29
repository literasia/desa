<?php

namespace App\Http\Controllers\Pegawai\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Pindah;
use App\Models\Employee;
use Illuminate\Http\Request;

class PindahController extends Controller
{
    public function index() {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        return view('pegawai.peristiwa.pindah', ["employee"=>$employee]);
    }
}
