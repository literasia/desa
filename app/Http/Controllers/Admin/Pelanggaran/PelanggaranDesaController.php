<?php

namespace App\Http\Controllers\Desa\Pelanggaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelanggaranDesaController extends Controller
{
    public function index() {
        return view('desa.pelanggaran.pelanggaran');
    }
}
