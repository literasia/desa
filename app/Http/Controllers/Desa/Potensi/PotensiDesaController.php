<?php

namespace App\Http\Controllers\Desa\Potensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function index() {
        return view('desa.potensi.potensi');
    }
}
