<?php

namespace App\Http\Controllers\Pegawai\Pembangunan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DevelopmentType;
use Yajra\DataTables\DataTables;
use Validator;


class JenisPembangunanController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DevelopmentType::where('village_id', auth()->user()->village_id)->latest()->get();
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

        return view('pegawai.pembangunan.jenispembangunan');
    }

    public function store(Request $request) 
    {
        $rules = [
            'types_name'  => 'required|max:100',
        ];
 
        $message = [
            'types_name' => 'Kolom ini tidak boleh kosong',
        ];
 
        $validator = Validator::make($request->all(), $rules, $message);
 
        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
 
        $suku = DevelopmentType::create([
            'village_id' => auth()->user()->village->id,
            'types_name'  => $request->types_name,
        ]);
 
        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
            ]);
    }

    public function edit($id) {
        $type = DevelopmentType::find($id);

        return response()
            ->json([
                'types'  => $type
            ]);
    }


    public function update(Request $request) {
        // validasi
        $rules = [
           'types_name'  => 'required|max:100',
       ];

       $message = [
           'types_name.required' => 'Kolom ini tidak boleh kosong',
       ];

       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       DevelopmentType::whereId($request->input('hidden_id'))->update([
            'types_name'  => $request->types_name,
       ]);

       return response()
           ->json([
               'success' => 'Data berhasil diupdate.',
           ]);
   }

   public function destroy($id)
    {
    $type = DevelopmentType::find($id);
    $type->delete();
    }
}