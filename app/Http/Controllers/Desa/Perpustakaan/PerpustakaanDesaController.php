<?php

namespace App\Http\Controllers\Desa\Perpustakaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerpustakaanDesaController extends Controller
{
    public function index() {
        return view('desa.perpustakaan.perpustakaan');
    }
}
