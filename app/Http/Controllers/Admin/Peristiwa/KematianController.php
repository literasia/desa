<?php

namespace App\Http\Controllers\Admin\Peristiwa;

use App\Http\Controllers\Controller;
use App\Models\Death;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;


class KematianController extends Controller
{
    public function index( Request $request) {

        if ($request->ajax()) {
            $data = Death::where('village_id', auth()->user()->village->id)->orderByDesc('created_at')->get();
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

        return view('admin.peristiwa.kematian');
    }

    public function store(Request $request )
    {
         // validasi
         $rules = [
            'no_kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'name'  => 'required|max:100',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'deathdate' => 'required',
            'deadcause' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status_marriage' => 'required',
            'address' => 'required',
        ];

        $message = [
            'no_kk.required' => 'kolom kk tidak boleh kosong',
            'nik.required' => 'kolom nik tidak boleh kosong',
            'name.required'  => 'kolom nama tidak boleh kosong',
            'birthplace.required' => 'kolom tempat lahir tidak boleh kosong',
            'birthdate.required' => 'kolom tanggal lahir tidak boleh kosong',
            'deathdate.required' => 'kolom tanggal kematian tidak boleh kosong',
            'deadcause.required' => 'kolom sebab kematian tidak boleh kosong',
            'gender.required' => 'kolom jenis kelamin tidak boleh kosong',
            'religion.required' => 'kolom agama tidak boleh kosong',
            'status_marriage.required' => 'kolom status tidak boleh kosong',
            'address.required' => 'kolom alamat tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Death::create([
            'village_id' =>  auth()->user()->village->id,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'deathdate' => $request->deathdate,
            'deadcause' => $request->deadcause,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'status_marriage' => $request->status_marriage,
            'address' => $request->address,
            ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $death = Death::find($id);

        return response()
            ->json([
                'death' => $death,
            ]);
    }

    public function update(Request $request)
    {
        // validasi
        $rules = [
            'no_kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'name'  => 'required|max:100',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'deathdate' => 'required',
            'deadcause' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status_marriage' => 'required',
        ];

        $message = [
            'no_kk.required' => 'kolom kk tidak boleh kosong',
            'nik.required' => 'kolom nik tidak boleh kosong',
            'name.required'  => 'kolom nama tidak boleh kosong',
            'birthplace.required' => 'kolom tempat lahir tidak boleh kosong',
            'birthdate.required' => 'kolom tanggal lahir tidak boleh kosong',
            'deathdate.required' => 'kolom tanggal kematian tidak boleh kosong',
            'deadcause.required' => 'kolom sebab kematian tidak boleh kosong',
            'gender.required' => 'kolom jenis kelamin tidak boleh kosong',
            'religion.required' => 'kolom agama tidak boleh kosong',
            'status_marriage.required' => 'kolom status tidak boleh kosong',
            'address.required' => 'kolom alamat tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Death::where('id', $request->hidden_id)->update([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'deathdate' => $request->deathdate,
            'deadcause' => $request->deadcause,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'status_marriage' => $request->status_marriage,
            'address' => $request->address,
            ]);
       

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
