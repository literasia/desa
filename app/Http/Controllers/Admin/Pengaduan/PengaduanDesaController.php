<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Complaint;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class PengaduanDesaController extends Controller
{
    public function index(Request $request)
    {
        $complaint = Complaint::where('village_id', auth()->user()->village->id)->get();

        if ($request->ajax()) {
            $data = Complaint::where('village_id', auth()->user()->village->id)->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($data) {
                    if($data->image){
                        $image = '<a href="'. Storage::url($data->image).'" class="text-success"><i class="fa fa-check-circle mr-2"></i>Uploaded</a>';
                    }else{
                        $image = " - ";
                    }
                    return $image;
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action', 'image'])
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
