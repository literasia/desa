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
                ->addColumn('status', function ($data) {
                    if($data->status == 'accepted'){
                        $status = "<label class='badge badge-primary m-0'>Diterima</label>";
                    }elseif($data->status == 'processing'){
                        $status = "<label class='badge badge-warning m-0'>Ditindak Lanjuti</label>";
                    }elseif($data->status == 'success'){
                        $status = "<label class='badge badge-success m-0'>Selesai</label>";
                    }
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action', 'image','status'])
                ->make(true);
        }

        return view('admin.pengaduan.pengaduan', compact('complaint'));
    }
    public function edit($id)
    {
        $data = Complaint::find($id);
        return response()
            ->json([
                'id'            => $data->id,
                'status'        => $data->status,
                'feedback'      => $data->feedback
            ]);
    }

    public function update(Request $req) {
        $data = $req->all();

        Complaint::whereId($data['hidden_id'])->update([
            'feedback' => $data['feedback'],
            'status' => $data['status'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);

    }

    public function destroy($id)
    {
        $pesan = Complaint::find($id);
        $pesan->delete();
    }
}
