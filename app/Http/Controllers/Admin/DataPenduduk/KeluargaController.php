<?php

namespace App\Http\Controllers\Admin\DataPenduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\{Family, Citizen, Province, Regency, Village, District};
use Validator;

class KeluargaController extends Controller
{
    private $rules = [
        'citizen_id' => 'required',
    ];

    private $update_rules = [
        'citizen_id' => 'required',
    ];


    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Family::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="view-keluarga btn btn-mini btn-primary shadow-sm">Keluarga</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->editColumn('citizen_id', function ($data) {
                    return $data->citizen->name;
                })
                ->addColumn('no_kk', function ($data) {
                    return $data->citizen->no_kk;
                })
                ->addColumn('alamat', function ($data) {
                    return $data->citizen->address;
                })
                ->addColumn('desa_kelurahan', function ($data) {
                    return $data->citizen->village->name;
                })
                ->addColumn('provinsi', function ($data) {
                    return $data->citizen->province->name;
                })
                ->addColumn('kabupaten', function ($data) {
                    return $data->citizen->regency->name;
                })
                ->addColumn('kecamatan', function ($data) {
                    return $data->citizen->district->name;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.data-penduduk.keluarga');
    }

    public function store(Request $request){
        $data = $request->all();
        $citizen_id_delete = $request->citizen_id;
        $validator = Validator::make($data, $this->rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        $family =  Family::create([
            'village_id' => auth()->user()->village->id,
            'citizen_id' => $data['citizen_id'],
        ]);

        return response()
            ->json([
                'citizen_id_delete' => $citizen_id_delete,
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Family::find($id);
        return response()
            ->json([
                'id'   => $data->id,
                'citizen_id' => $data['citizen_id'],
            ]);
    }

    public function update(Request $request) {
        $data = $request->all();
        $family = Family::findOrFail($data['hidden_id']);

        $validator = Validator::make($data, $this->update_rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        $family->update([
            'village_id' => auth()->user()->village->id,
            'citizen_id' => $data['citizen_id'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * abc
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family = Family::findOrFail($id);
        $citizen = Citizen::findOrFail($family->citizen_id);

        $family->delete();
        return response()->json($citizen);
    }

    public function getCitizen(){
        $citizen = Citizen::where('is_head_of_family', 1)->whereNotIn('id', function($query){
            $query->select('citizen_id')->from('families');
        })->where('village_id', auth()->user()->village_id)->get();

        return response()->json($citizen);
    }
    
    public function getFamily($id){
        $family = Family::findOrFail($id);
        $family_group = Citizen::where('village_id', auth()->user()->village_id)->where('no_kk', $family->citizen->no_kk)->get();
        $get_first_family = Citizen::where('village_id', auth()->user()->village_id)->where('no_kk', $family->citizen->no_kk)->first();

        $provinsi = Province::findOrFail($get_first_family->province_id);
        $kabupaten = Regency::findOrFail($get_first_family->regency_id);
        $kecamatan = District::findOrFail($get_first_family->district_id);
        $desa = Village::findOrFail($get_first_family->village_id);
        $alamat = $get_first_family->address;
        $no_kk = $get_first_family->no_kk;

        
        return response()
        ->json([
            'head_of_family' => $family->citizen->name,
            'family_group' => $family_group,
            'kabupaten' => $kabupaten->name,
            'kecamatan' => $kecamatan->name,
            'desa' => $desa->name,
            'alamat' => $alamat,
            'provinsi' => $provinsi->name,
            'no_kk' => $no_kk,
        ]);
    }
}
