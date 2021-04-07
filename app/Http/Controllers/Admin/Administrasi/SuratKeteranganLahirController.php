<?php

namespace App\Http\Controllers\Desa\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKeteranganLahirController extends Controller
{
    public function index() {
        return view('desa.administrasi.surat-keterangan-lahir');
    }
}
