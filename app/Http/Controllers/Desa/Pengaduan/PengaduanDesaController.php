<?php

namespace App\Http\Controllers\Desa\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanDesaController extends Controller
{
    public function index() {
        return view('desa.pengaduan.pengaduan');
    }
}
