<?php

namespace App\Http\Controllers\Desa\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeteranganBerkelakuanBaikController extends Controller
{
    public function index() {
        return view('desa.administrasi.keterangan-berkelakuan-baik');
    }
}
