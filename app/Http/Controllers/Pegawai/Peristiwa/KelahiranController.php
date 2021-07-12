<?php

namespace App\Http\Controllers\Pegawai\Peristiwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Birth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;


class KelahiranController extends Controller
{
    public function index( Request $request) {

        if ($request->ajax()) {
            $data = Birth::where('village_id', auth()->user()->village->id)->orderByDesc('created_at')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

        return view('pegawai.peristiwa.kelahiran');
    }

    public function store(Request $request )
    {
         // validasi
         $rules = [
            'no_kk' => 'required|max:16',
            'name'  => 'required|max:100',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'dadname' => 'required',
            'momname' => 'required'
        ];

        $message = [
            'no_kk.required' => 'kolom nik tidak boleh kosong',
            'name.required'  => 'kolom nama tidak boleh kosong',
            'birthplace.required' => 'kolom tempat lahir tidak boleh kosong',
            'birthdate.required' => 'kolom tanggal lahir tidak boleh kosong',
            'gender.required' => 'kolom jenis kelamin tidak boleh kosong',
            'religion.required' => 'kolom agama tidak boleh kosong',
            'address.required' => 'kolom alamat tidak boleh kosong',
            'dadname.required' => 'kolom nama ayah tidak boleh kosong',
            'momname.required' => 'kolom nama ibu tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Birth::create([
            'village_id' =>  auth()->user()->village->id,
            'no_kk' => $request->no_kk,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'dadname' => $request->dadname,
            'momname' => $request->momname
            ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $birth = Birth::find($id);

        return response()
            ->json([
                'birth' => $birth,
            ]);
    }

    public function update(Request $request)
    {
        // validasi
        $rules = [
            'no_kk' => 'required|max:16',
            'name'  => 'required|max:100',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'dadname' => 'required',
            'momname' => 'required'
        ];

        $message = [
            'no_kk.required' => 'kolom no kk tidak boleh kosong',
            'name.required'  => 'kolom nama tidak boleh kosong',
            'birthplace.required' => 'kolom tempat lahir tidak boleh kosong',
            'birthdate.required' => 'kolom tanggal lahir tidak boleh kosong',
            'gender.required' => 'kolom jenis kelamin tidak boleh kosong',
            'religion.required' => 'kolom agama tidak boleh kosong',
            'address.required' => 'kolom alamat tidak boleh kosong',
            'dadname.required' => 'kolom nama ayah tidak boleh kosong',
            'momname.required' => 'kolom nama ibu tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Birth::where('id', $request->hidden_id)->update([
            'no_kk' => $request->no_kk,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'dadname' => $request->dadname,
            'momname' => $request->momname
            ]);
       

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
