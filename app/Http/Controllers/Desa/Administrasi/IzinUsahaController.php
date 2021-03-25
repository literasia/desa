<?php

namespace App\Http\Controllers\Desa\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IzinUsahaController extends Controller
{
    public function index() {
        return view('desa.administrasi.izin-usaha');
    }
}
