<?php

namespace App\Http\Controllers\Desa\Kampanye;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KampanyeController extends Controller
{
    public function index() {
        return view('desa.kampanye.kampanye');
    }
}
