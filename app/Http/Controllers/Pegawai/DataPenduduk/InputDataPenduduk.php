<?php

namespace App\Http\Controllers\Pegawai\DataPenduduk;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index() {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        return view('pegawai.data-penduduk.input-data-penduduk', ["employee" => $employee]);
    }
}
