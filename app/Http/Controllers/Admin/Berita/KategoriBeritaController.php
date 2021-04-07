<?php

namespace App\Http\Controllers\Admin\Berita;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class KategoriBeritaController extends Controller
{
    public function index(Request $request) {
        return view('admin.berita.kategori-berita');
    }
}
