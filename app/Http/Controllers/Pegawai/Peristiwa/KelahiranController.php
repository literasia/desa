<?php

namespace App\Http\Controllers\Pegawai\Peristiwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class KelahiranController extends Controller
{
    public function index() {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        return view('pegawai.peristiwa.kelahiran', ["employee"=>$employee]);
    }
}
