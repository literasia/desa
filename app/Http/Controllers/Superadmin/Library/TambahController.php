<?php

namespace App\Http\Controllers\Superadmin\Library;

use Illuminate\Http\Request;
use App\Models\Superadmin\Tipe;
use Yajra\DataTables\DataTables;
use App\Models\Superadmin\Library;
use App\Models\Superadmin\Sekolah;
use App\Http\Controllers\Controller;

class TambahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.superadmin');
    }

    public function index(Request $request) {
        return view('superadmin.library.tambah-baru');
    }
}
