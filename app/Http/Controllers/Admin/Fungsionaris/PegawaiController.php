<?php

namespace App\Http\Controllers\Admin\Fungsionaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        return view('admin.fungsionaris.pegawai');
    }
}