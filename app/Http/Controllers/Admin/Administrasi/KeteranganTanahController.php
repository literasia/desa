<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\LandCertificate;
use Illuminate\Support\Facades\Storage;


class KeteranganTanahController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = LandCertificate::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
                ->addColumn('image_ktp', function ($data) {
                    if($data->image_ktp){
                        $image = '<a href="'. Storage::url($data->image_ktp).'" class="text-success"><i class="fa fa-check-circle mr-2"></i>Uploaded</a>';
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
                ->rawColumns(['status', 'action','image_ktp'])
                ->make(true);
        }   

        return view('admin.administrasi.keterangan-tanah');
    }

    public function edit($id)
    {
        $data = LandCertificate::find($id);
        return response()
            ->json([
                'id'            => $data->id,
                'status'        => $data->status,
            ]);
    }

    public function update(Request $req) {
        $data = $req->all();

        LandCertificate::whereId($data['hidden_id'])->update([
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
        $land_certificate = LandCertificate::find($id);
        $land_certificate->delete();
    }
}
