<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Ktp;

class PermohonanKTPController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Ktp::latest()->get();
            return DataTables::of($data)
                ->addColumn('status', function($data){
                    
                    switch ($data->status) {
                        case 'processing':
                            return '<lable class="badge badge-warning m-0">'. $data->status .'</label>';
                            break;
                        case 'success':
                            return '<lable class="badge badge-success m-0">'. $data->status .'</label>';
                            break;
                        case 'rejected':
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
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.administrasi.permohonan-pembuatan-ktp');
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
