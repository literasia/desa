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
                ->addColumn('status', function($data){
                    
                    switch ($data->status) {
                        case 'Proses':
                            return '<label class="badge badge-warning m-0">'. $data->status .'</label>';
                            break;
                        case 'Selesai':
                            return '<lable class="badge badge-success m-0">'. $data->status .'</label>';
                            break;
                        case 'Ditolak':
                            return '<lable class="badge badge-danger m-0">'. $data->status .'</label>';
                            break;                        
                        default:
                            # code...
                            break;
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.administrasi.surat-keterangan-lahir');
    }

    public function edit($id)
    {
        $data = BirthCertificate::find($id);
        return response()
            ->json([
                'id'            => $data->id,
                'status'        => $data->status,
            ]);
    }

    public function update(Request $req) {
        $data = $req->all();

        BirthCertificate::whereId($data['hidden_id'])->update([
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
        $surat_lahir = BirthCertificate::find($id);
        $surat_lahir->delete();
    }
}
