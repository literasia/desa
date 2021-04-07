<?php

namespace App\Http\Controllers\Desa\Peristiwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function index() {
        return view('desa.peristiwa.kelahiran');
    }
}
