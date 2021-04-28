<?php

namespace App\Http\Controllers\Pegawai\DataPenduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class PendudukController extends Controller
{
    public function index() {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        return view('pegawai.data-penduduk.penduduk', ["employee" => $employee]);
    }
}
