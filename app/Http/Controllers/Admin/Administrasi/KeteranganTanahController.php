<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\LandCertificate;

class KeteranganTanahController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = LandCertificate::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.administrasi.keterangan-tanah');
    }
}
