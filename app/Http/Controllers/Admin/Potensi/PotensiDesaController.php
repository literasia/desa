<?php

namespace App\Http\Controllers\Admin\Potensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function index() {
        return view('admin.potensi.potensi');
    }
}
