<?php

namespace App\Http\Controllers\Admin\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiPegawaiController extends Controller
{
    public function index() {
        return view('admin.absensi.pegawai');
    }
}
