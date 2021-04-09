<?php

namespace App\Http\Controllers\Admin\Administrasi;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Domicile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\User;

class KeteranganDomisiliController extends Controller
{
    public function index(Request $request)
    {
        $data = Domicile::where('village_id', auth()->user()->village->id)->get();
        if ($request->ajax()) {
            $data = Domicile::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('image', function ($data) {
                    $btnlink = '<a target="_blank" href="'.Storage::url($data->image).'">Lihat Foto</a>';
                    return $btnlink;
                })
                ->addColumn('status', function ($data) {
                    if($data->status == 'processing'){
                        $status = "<label class='badge badge-warning m-0'>Proses</label>";
                    }elseif($data->status == 'success'){
                        $status = "<label class='badge badge-success m-0'>Selesai</label>";
                    }elseif($data->status == 'rejected'){
                        $status = "<label class='badge badge-danger m-0'>Ditolak</label>";
                    }
                    return $status;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.administrasi.keterangan-domisili');
    }

    public function edit($id)
    {
        $data = Domicile::find($id);
        return response()
            ->json([
                'id'            => $data->id,
                'status'        => $data->status,
            ]);
    }

    public function update(Request $req) {
        $data = $req->all();

        Domicile::whereId($data['hidden_id'])->update([
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
        $Domicile = Domicile::find($id);
        $Domicile->delete();
    }
}