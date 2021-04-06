<?php

namespace App\Http\Controllers\Desa\Referensi;

use Validator;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PengaturanHakAksesController extends Controller
{
    public function index(Request $request) {
        return view('desa.referensi.pengaturan-hak-akses');
    }
}