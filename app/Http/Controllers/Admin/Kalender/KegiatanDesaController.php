<?php

namespace App\Http\Controllers\Admin\Kalender;

use App\Models\Admin\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class KegiatanDesaController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.kalender.kegiatan-desa');
    }

}