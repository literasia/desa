<?php

namespace App\Http\Controllers\Admin\WisataDesa;

use Validator;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class WisataDesaController extends Controller
{
    public function index() {
        return view('admin.wisata-desa.wisata-desa');
    }
}