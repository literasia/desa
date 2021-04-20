<?php

namespace App\Http\Controllers\Admin\Peristiwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Birth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class KelahiranController extends Controller
{
    public function index( Request $request) {
        $status = Birth::where('village_id', auth()->user()->village->id)->get();

        if ($request->ajax()) {
            $data = Birth::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

        return view('admin.peristiwa.kelahiran');
    }

    public function update($id, Request $request)
    {
        if($request->reject == 'rejected'){
            $update = Birth::where('id', $id)->update([
                'status' => $request->reject,
            ]);
        }else{
            $update = Birth::where('id', $id)->update([
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
        $pesan = Birth::find($id);
        $pesan->delete();
    }
}
