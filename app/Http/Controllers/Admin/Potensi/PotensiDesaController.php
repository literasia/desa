<?php

namespace App\Http\Controllers\Admin\Potensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Potency;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class PotensiDesaController extends Controller
{
    public function index( Request $request) {
        $status = Potency::where('village_id', auth()->user()->village->id)->get('status');

        if ($request->ajax()) {
            $data = Potency::where('village_id', auth()->user()->village->id)->orderByDesc('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image_ktp', function ($data) {
                    $image = '<a href="'. Storage::url($data->image_ktp).'" class="text-success"><i class="fa fa-check-circle mr-2"></i>Uploaded</a>';
                    return $image;
                })
                ->addColumn('status', function ($data) {
                    if($data->status == "active"){
                        $class = 'btn btn-round btn-success btn-mini update';
                        $text = 'Disetujui';
                    }else if($data->status == "rejected"){
                        $class = 'btn btn-round btn-danger btn-mini update';
                        $text = 'Ditolak';
                    }else{
                        $class = 'btn btn-round btn-secondary btn-mini update';
                        $text = 'Setuju ?';
                    }
                   $status = '<button id="' . $data->id . '" class="'.$class.'">'.$text.'</button>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $button = '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action','status','image_ktp'])
                ->make(true);
            }

        return view('admin.potensi.potensi', compact('status'));
    }

    public function update($id, Request $request)
    {
        if($request->reject == 'rejected'){
            $update = Potency::where('id', $id)->update([
                'status' => $request->reject,
            ]);
        }else{
            $update = Potency::where('id', $id)->update([
                'status' => 'active',
            ]);
        }
        

        return response()
        ->json([
            'success' => 'Data Updated.',
        ]);
    }

    public function destroy($id)
    {
        $pesan = Potency::find($id);
        $pesan->delete();
    }
}
