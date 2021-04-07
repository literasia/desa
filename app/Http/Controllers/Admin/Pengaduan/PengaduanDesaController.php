<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Complaint;
use Yajra\DataTables\DataTables;

class PengaduanDesaController extends Controller
{
    public function index(Request $request)
    {
        $complaint = Complaint::where('village_id', auth()->user()->village->id)->get();

        if ($request->ajax()) {
            $data = Complaint::where('village_id', auth()->user()->village->id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pengaduan.pengaduan', compact('complaint'));
    }

    public function destroy($id)
    {
        $pesan = Complaint::find($id);
        $pesan->delete();
    }
}
