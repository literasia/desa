<?php

namespace App\Http\Controllers\Admin\Kalender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriKegiatanController extends Controller
{
    public function index() {
        return view('admin.kalender.kategori-kegiatan');
    }
}
