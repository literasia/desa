<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeteranganAhliWarisController extends Controller
{
    public function index() {
        return view('admin.administrasi.keterangan-ahli-waris');
    }
}
