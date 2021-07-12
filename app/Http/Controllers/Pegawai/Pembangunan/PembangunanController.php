<?php

namespace App\Http\Controllers\Pegawai\Pembangunan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DevelopmentType;
use App\Models\Development;
use Yajra\DataTables\DataTables;
use Validator;


class PembangunanController extends Controller
{

    public function index(Request $request)
    {
        $type = DevelopmentType::where('village_id', auth()->user()->village_id)->latest()->get();
       
         if ($request->ajax()) {
            $data = Development::select('developments.id','development_name','description','types_name')->join('development_types', 'developments.development_types_id', 'development_types.id')
                                ->where('developments.village_id', auth()->user()->village_id)->get();
           
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

        return view('pegawai.pembangunan.pembangunan', compact('type'));

    }

    public function store(Request $request) 
    {
         // validasi
         $rules = [
            'title'  => 'required',
            'type_id' => 'required',
            'description' => 'required',
        ];

        $message = [
            'title.required' => 'Kolom judul tidak boleh kosong',
            'type_id.required' => 'Kolom tipe tidak boleh kosong',
            'description.required' => 'Kolom deskripsi tidak boleh kosong',
        ];


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Development::create([
            'development_name' => $request->title,
            'development_types_id' => $request->type_id,
            'description' => $request->description,
            'village_id' => auth()->user()->village->id
        ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id) {
        $dev = Development::select('developments.id','development_types.id as type_id','development_name','description','types_name')
                            ->join('development_types', 'developments.development_types_id', 'development_types.id')
                            ->where('developments.id', $id)->get();

        return response()
            ->json([
                'development'  => $dev
            ]);
    }


    public function update(Request $request) {
       
        // validasi
        $rules = [
            'title'  => 'required',
            'type_id' => 'required',
            'description' => 'required',
        ];

        $message = [
            'title.required' => 'Kolom judul tidak boleh kosong',
            'type_id.required' => 'Kolom tipe tidak boleh kosong',
            'description.required' => 'Kolom deskripsi tidak boleh kosong',
        ];
       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       Development::whereId($request->input('hidden_id'))->update([
            'development_name' => $request->title,
            'development_types_id' => $request->type_id,
            'description' => $request->description,
       ]);

       return response()
           ->json([
               'success' => 'Data berhasil diupdate.',
           ]);
   }

   public function destroy($id)
    {
        $dev = Development::find($id);
        $dev->delete();
    }
}