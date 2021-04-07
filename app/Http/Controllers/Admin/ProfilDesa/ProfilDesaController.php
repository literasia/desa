<?php

namespace App\Http\Controllers\Admin\ProfilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index() {
        return view('admin.profil-desa.profil-desa');
    }
}
