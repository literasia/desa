<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\BusinessPermits;

class IzinUsahaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = BusinessPermits::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.administrasi.izin-usaha');
    }
}
