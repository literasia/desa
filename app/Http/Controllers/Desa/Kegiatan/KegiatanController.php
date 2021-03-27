<?php

namespace App\Http\Controllers\Desa\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index() {
        return view('desa.kegiatan.kegiatan');
    }
}
