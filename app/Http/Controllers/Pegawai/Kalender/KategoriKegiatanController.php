<?php

namespace App\Http\Controllers\Pegawai\Kalender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCalendar;
use Yajra\DataTables\DataTables;
use Validator;
use App\Models\Employee;

class KategoriKegiatanController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = CategoryCalendar::where('village_id', auth()->user()->village->id)->get();
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
        $employee = Employee::where("user_id",auth()->user()->id)->first();

        return view('pegawai.kalender.kategori-kegiatan',["employee"=>$employee]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kategori_kegiatan'  => 'required|max:100',

        ];

        $message = [
            'kategori_kegiatan.required' => 'This column cannot be empty',
        ];


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $category = CategoryCalendar::create([
            'village_id' => auth()->user()->village->id,
            'category_name' => $request->kategori_kegiatan
        ]);

        return response()
           ->json([
               'success' => 'Data berhasil ditambahkan.',
           ]);
    }

    public function edit($id)
    {
        $category = CategoryCalendar::find($id);

        return response()
            ->json([
                'data' => $category,
            ]);
    }

    public function update(Request $req)
    {
        // validasi
        $rules = [
            'kategori_kegiatan'  => 'required|max:100',

        ];

        $message = [
            'kategori_kegiatan.required' => 'Kolom ini tidak boleh kosong',

        ];

        $validator = Validator::make($req->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $update = CategoryCalendar::where('id', $req->hidden_id)->update([
            'category_name' => $req->kategori_kegiatan,
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = CategoryCalendar::find($id);
        $pesan->delete();
    }
}
