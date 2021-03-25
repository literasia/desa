<?php

namespace App\Http\Controllers\Desa\DataPenduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index() {
        return view('desa.data-penduduk.keluarga');
    }
}
