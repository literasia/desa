<?php

namespace App\Http\Controllers\Desa\Struktur;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index() {
        return view('desa.struktur.pegawai');
    }
}