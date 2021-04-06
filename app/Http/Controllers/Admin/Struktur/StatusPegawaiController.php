<?php

namespace App\Http\Controllers\Desa\Struktur;

use Validator;
use App\Models\StatusPegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class StatusPegawaiController extends Controller
{
    public function index() {
        return view('desa.struktur.status-pegawai');
    }
}