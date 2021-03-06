<?php

namespace App\Http\Controllers\Pegawai\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Ktp;
use Illuminate\Support\Facades\Storage;


class PermohonanKTPController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Ktp::latest()->get();
            return DataTables::of($data)
                ->addColumn('status', function($data){
                    
                    switch ($data->status) {
                       case 'processing':
                            return "<label class='badge badge-warning m-0'>Proses</label>";
                            break;
                        case 'success':
                            return "<label class='badge badge-success m-0'>Selesai</label>";
                            break;
                        case 'rejected':
                            return "<label class='badge badge-danger m-0'>Ditolak</label>";
                            break;                        
                        default:
                            # code...
                            break;
                    }
                })
                ->addColumn('kk_image', function ($data) {
                    if($data->kk_image){
                        $image = '<a href="'. Storage::url($data->kk_image).'" class="text-success"><i class="fa fa-check-circle mr-2"></i>Lihat Foto</a>';
                    }else{
                        $image = " - ";
                    }
                    return $image;
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['status', 'action', 'kk_image'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pegawai.administrasi.permohonan-pembuatan-ktp');
    }

    public function edit($id)
    {
        $data = KTP::find($id);
        return response()
            ->json([
                'id'            => $data->id,
                'status'        => $data->status,
            ]);
    }

    public function update(Request $req) {
        $data = $req->all();

        KTP::whereId($data['hidden_id'])->update([
            'village_id' => auth()->user()->village->id,
            'status' => $data['status'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);

    }

    public function destroy($id)
    {
        $ktp = KTP::find($id);
        $ktp->delete();
    }
}
