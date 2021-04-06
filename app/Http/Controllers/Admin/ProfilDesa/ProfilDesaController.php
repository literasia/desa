<?php

namespace App\Http\Controllers\Desa\ProfilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index() {
        return view('desa.profil-desa.profil-desa');
    }
}
