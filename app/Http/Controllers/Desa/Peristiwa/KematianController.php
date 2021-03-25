<?php

namespace App\Http\Controllers\Desa\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Kematian;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index() {
        return view('desa.peristiwa.kematian');
    }
}
