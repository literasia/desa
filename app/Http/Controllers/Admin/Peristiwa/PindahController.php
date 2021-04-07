<?php

namespace App\Http\Controllers\Desa\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Pindah;
use Illuminate\Http\Request;

class PindahController extends Controller
{
    public function index() {
        return view('desa.peristiwa.pindah');
    }
}
