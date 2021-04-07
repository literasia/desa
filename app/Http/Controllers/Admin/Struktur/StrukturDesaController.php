<?php

namespace App\Http\Controllers\Desa\Struktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturDesaController extends Controller
{
    public function index() {
        return view('desa.struktur.struktur');
    }
}
