<?php

namespace App\Http\Controllers\Admin\Potensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use App\Models\BusinessType;

class JenisUsahaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = BusinessType::where('village_id', auth()->user()->village->id)->get()->orderByDesc('created_at');
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                        $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                        return $button;
                    })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.potensi.jenis-usaha');
    }

    public function store(Request $request)
    {
        $rules = [
            'jenis_usaha'  => 'required|max:100',
           
        ];

        $message = [
            'jenis_usaha.required' => 'This column cannot be empty',
        ];

        
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $category = BusinessType::create([
            'village_id' => auth()->user()->village->id,
            'business_type' => $request->jenis_usaha
        ]);

        return response()
           ->json([
               'success' => 'Data berhasil ditambahkan.',
           ]);
    }

    public function edit($id)
    {
        $types = BusinessType::find($id);

        return response()
            ->json([
                'data' => $types,
            ]);
    }

    public function update(Request $req)
    {
        // validasi
        $rules = [
            'jenis_usaha'  => 'required|max:100',
          
        ];

        $message = [
            'jenis_usaha.required' => 'Kolom ini tidak boleh kosong',
           
        ];

        $validator = Validator::make($req->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $update = BusinessType::where('id', $req->hidden_id)->update([
            'business_type' => $req->jenis_usaha,
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = BusinessType::find($id);
        $pesan->delete();
    }
}
