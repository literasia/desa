<?php

namespace App\Http\Controllers\Admin\Potensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryBusiness;
use Yajra\DataTables\DataTables;
use Validator;

class KategoriUsahaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = CategoryBusiness::where('village_id', auth()->user()->village->id)->get()->orderByDesc('created_at');
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

        return view('admin.potensi.kategori-usaha');
    }

    public function store(Request $request)
    {
        $rules = [
            'kategori_usaha'  => 'required|max:100',
           
        ];

        $message = [
            'kategori_usaha.required' => 'This column cannot be empty',
        ];

        
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $category = CategoryBusiness::create([
            'village_id' => auth()->user()->village->id,
            'category_name' => $request->kategori_usaha
        ]);

        return response()
           ->json([
               'success' => 'Data berhasil ditambahkan.',
           ]);
    }

    public function edit($id)
    {
        $category = CategoryBusiness::find($id);

        return response()
            ->json([
                'data' => $category,
            ]);
    }

    public function update(Request $req)
    {
        // validasi
        $rules = [
            'kategori_usaha'  => 'required|max:100',
          
        ];

        $message = [
            'kategori_usaha.required' => 'Kolom ini tidak boleh kosong',
           
        ];

        $validator = Validator::make($req->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $update = CategoryBusiness::where('id', $req->hidden_id)->update([
            'category_name' => $req->kategori_usaha,
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = CategoryBusiness::find($id);
        $pesan->delete();
    }
}
