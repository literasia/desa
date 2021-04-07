<?php

namespace App\Http\Controllers\Admin\Referensi;

use Validator;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PengaturanHakAksesController extends Controller
{
    public function index() {
        return view('admin.referensi.pengaturan-hak-akses');
    }
}