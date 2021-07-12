<?php

namespace App\Http\Controllers\Pegawai\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Immigrate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;


class PindahController extends Controller
{
    public function index( Request $request) {

        if ($request->ajax()) {
            $data = Immigrate::where('village_id', auth()->user()->village->id)->orderByDesc('created_at')->get();
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

        return view('pegawai.peristiwa.pindah');
    }

    public function store(Request $request )
    {
         // validasi
         $rules = [
            'nik' => 'required|max:16',
            'name'  => 'required|max:100',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'movedate' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status_marriage' => 'required',
            'address_before' => 'required',
            'address_after' => 'required'
        ];

        $message = [
            'nik.required' => 'kolom nik tidak boleh kosong',
            'name.required'  => 'kolom nama tidak boleh kosong',
            'birthplace.required' => 'kolom tempat lahir tidak boleh kosong',
            'birthdate.required' => 'kolom tanggal lahir tidak boleh kosong',
            'movedate.required' => 'kolom tanggal kematian tidak boleh kosong',
            'gender.required' => 'kolom jenis kelamin tidak boleh kosong',
            'religion.required' => 'kolom agama tidak boleh kosong',
            'status_marriage.required' => 'kolom status tidak boleh kosong',
            'address_before.required' => 'kolom alamat 1 tidak boleh kosong',
            'address_after.required' => 'kolom alamat 2 tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Immigrate::create([
            'village_id' =>  auth()->user()->village->id,
            'nik' => $request->nik,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'movedate' => $request->movedate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'status_marriage' => $request->status_marriage,
            'address' => $request->address_before,
            'newaddress' => $request->address_after,
            'information' => $request->information
            ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $move = Immigrate::find($id);

        return response()
            ->json([
                'move' => $move,
            ]);
    }

    public function update(Request $request)
    {
        // validasi
        $rules = [
            'nik' => 'required|max:16',
            'name'  => 'required|max:100',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'movedate' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status_marriage' => 'required',
            'address_before' => 'required',
            'address_after' => 'required'
        ];

        $message = [
            'nik.required' => 'kolom nik tidak boleh kosong',
            'name.required'  => 'kolom nama tidak boleh kosong',
            'birthplace.required' => 'kolom tempat lahir tidak boleh kosong',
            'birthdate.required' => 'kolom tanggal lahir tidak boleh kosong',
            'movedate.required' => 'kolom tanggal kematian tidak boleh kosong',
            'gender.required' => 'kolom jenis kelamin tidak boleh kosong',
            'religion.required' => 'kolom agama tidak boleh kosong',
            'status_marriage.required' => 'kolom status tidak boleh kosong',
            'address_before.required' => 'kolom alamat 1 tidak boleh kosong',
            'address_after.required' => 'kolom alamat 2 tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Immigrate::where('id', $request->hidden_id)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'movedate' => $request->movedate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'status_marriage' => $request->status_marriage,
            'address' => $request->address_before,
            'newaddress' => $request->address_after,
            'information' => $request->information
            ]);
       

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    
    public function destroy($id)
    {
        $pesan = Immigrate::find($id);
        $pesan->delete();
    }
}