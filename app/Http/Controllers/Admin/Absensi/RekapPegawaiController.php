<?php

namespace App\Http\Controllers\Admin\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapPegawaiController extends Controller
{
    public function index() {
        return view('admin.absensi.rekap-pegawai');
    }
}
