<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKeteranganLahirController extends Controller
{
    public function index() {
        return view('admin.administrasi.surat-keterangan-lahir');
    }
}
