<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirthCertificate;
use Yajra\DataTables\DataTables;

class SuratKeteranganLahirController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = BirthCertificate::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.administrasi.surat-keterangan-lahir');
    }
}
