<?php

namespace App\Http\Controllers\Admin\Pengumuman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanDesaController extends Controller
{
    public function index() {
        return view('admin.pengumuman.pengumuman');
    }
}
