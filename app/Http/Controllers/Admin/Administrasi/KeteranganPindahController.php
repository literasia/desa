<?php

namespace App\Http\Controllers\Desa\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeteranganPindahController extends Controller
{
    public function index() {
        return view('admin.administrasi.keterangan-pindah');
    }
}
