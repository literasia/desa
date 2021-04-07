<?php

namespace App\Http\Controllers\Admin\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Pindah;
use Illuminate\Http\Request;

class PindahController extends Controller
{
    public function index() {
        return view('admin.peristiwa.pindah');
    }
}
