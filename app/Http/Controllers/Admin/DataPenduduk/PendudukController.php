<?php

namespace App\Http\Controllers\Admin\DataPenduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index() {
        return view('admin.data-penduduk.penduduk');
    }
}
