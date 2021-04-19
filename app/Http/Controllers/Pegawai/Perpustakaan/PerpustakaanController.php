<?php

namespace App\Http\Controllers\Pegawai\Perpustakaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index() {
        return view('pegawai.perpustakaan.perpustakaan');
    }
}
