<?php

namespace App\Http\Controllers\Desa\Berita;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class KategoriBeritaController extends Controller
{
    public function index(Request $request) {
        return view('desa.berita.kategori-berita');
    }
}
