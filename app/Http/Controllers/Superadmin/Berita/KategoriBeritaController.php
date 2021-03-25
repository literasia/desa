<?php

namespace App\Http\Controllers\Superadmin\Berita;

use Validator;
use Illuminate\Http\Request;
use App\Models\Superadmin\KategoriBerita;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class KategoriBeritaController extends Controller
{
    public function index(Request $request) {
        return view('superadmin.berita.kategori-berita');
    }
}
