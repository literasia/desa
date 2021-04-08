<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Sktm;

class KeteranganTidakMampuController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Sktm::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.administrasi.keterangan-tidak-mampu');
    }
}
