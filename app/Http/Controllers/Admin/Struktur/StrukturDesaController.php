<?php

namespace App\Http\Controllers\Admin\Struktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturDesaController extends Controller
{
    public function index() {
        return view('admin.struktur.struktur');
    }
}
