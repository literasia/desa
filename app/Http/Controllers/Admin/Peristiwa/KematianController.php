<?php

namespace App\Http\Controllers\Admin\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Death;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KematianController extends Controller
{
    public function index( Request $request) {
        $status = Death::where('village_id', auth()->user()->village->id)->get();

        if ($request->ajax()) {
            $data = Death::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

        return view('admin.peristiwa.kematian');
    }

    public function update($id, Request $request)
    {
        if($request->reject == 'rejected'){
            $update = Death::where('id', $id)->update([
                'status' => $request->reject,
            ]);
        }else{
            $update = Death::where('id', $id)->update([
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
        $pesan = Death::find($id);
        $pesan->delete();
    }
}
