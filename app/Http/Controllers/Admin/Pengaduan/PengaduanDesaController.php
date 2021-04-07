<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanDesaController extends Controller
{
    public function index() {
        return view('admin.pengaduan.pengaduan');
    }
}
