<?php

namespace App\Http\Controllers\Desa\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiDesaController extends Controller
{
    public function index() {
        return view('desa.absensi.absensi');
    }
}
