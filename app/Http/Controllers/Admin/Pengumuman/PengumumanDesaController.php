<?php

namespace App\Http\Controllers\Desa\Pengumuman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanDesaController extends Controller
{
    public function index() {
        return view('desa.pengumuman.pengumuman');
    }
}
