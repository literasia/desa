<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerubahanKKController extends Controller
{
    public function index() {
        return view('admin.administrasi.perubahan-kk');
    }
}
