<?php

namespace App\Http\Controllers\Desa\Struktur;

use Validator;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class GolonganController extends Controller
{
    public function index() {
        return view('desa.struktur.golongan');
    }
}