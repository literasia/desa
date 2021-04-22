<?php

namespace App\Http\Controllers\Pegawai\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Complaint;
use Yajra\DataTables\DataTables;
use App\Models\Employee;

class PengaduanDesaController extends Controller
{
    public function index(Request $request)
    {
        $complaint = Complaint::where('village_id', auth()->user()->village->id)->get();
        $employee = Employee::where("user_id",auth()->user()->id)->first();

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

        return view('pegawai.pengaduan.pengaduan', compact('complaint',"employee"));
    }

    public function destroy($id)
    {
        $pesan = Complaint::find($id);
        $pesan->delete();
    }
}
