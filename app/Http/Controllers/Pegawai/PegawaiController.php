<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class PegawaiController extends Controller
{
    public function index()
    {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        return view("pegawai.index", ["employee"=>$employee]);
    }
}
