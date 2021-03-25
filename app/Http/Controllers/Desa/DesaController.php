<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index() {
        return view('desa.index');
    }
}
