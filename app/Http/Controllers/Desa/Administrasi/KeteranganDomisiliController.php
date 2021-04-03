<?php

namespace App\Http\Controllers\Desa\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeteranganDomisiliController extends Controller
{
    public function index() {
        return view('desa.administrasi.keterangan-domisili');
    }
}
