<?php

namespace App\Http\Controllers\Admin\DataPenduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\{Citizen, Province, Regency, Village, District};

class PendudukController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Citizen::latest()->get();
            return DataTables::of($data)
                ->editColumn('regency_id', function($data){
                    $regency = Regency::where('id', $data->regency_id)->first();
                    return $regency->name;
                })
                ->editColumn('village_id', function($data){
                    $village = Village::where('id', $data->village_id)->first();
                    return $village->name;
                })
                ->editColumn('province_id', function($data){
                    $province = Province::where('id', $data->province_id)->first();
                    return $province->name;
                })
                ->editColumn('district_id', function($data){
                    $district = District::where('id', $data->district_id)->first();
                    return $district->name;
                })
                ->editColumn('family_status', function($data){
                    if($data->family_status == "father"){
                        return "Ayah";
                    }elseif($data->mother == "Mother"){
                        return "Ibu";
                    }elseif($data->mother == "Child"){
                        return "Anak";
                    }
                })
                ->editColumn('sex', function($data){
                    if($data->sex == "male"){
                        return "Laki - laki";
                    }else{
                        return "Perempuan";
                    }
                })
                ->editColumn('marital_status', function($data){
                    if($data->marital_status == "single"){
                        return "Lajang";
                    }elseif($data->marital_status == "married"){
                        return "Menikah";
                    }else{
                        return "Cerai";
                    }
                })
                ->editColumn('religion', function($data){
                    if($data->religion == "islam"){
                        return "islam";
                    }elseif($data->religion == "cristian"){
                        return "Kristen";
                    }elseif($data->religion == "chatolic"){
                        return "Khatolik";
                    }elseif($data->religion == "confucianism"){
                        return "Konfusianisme";
                    }
                })
                ->editColumn('work_type', function($data){
                    if($data->work_type == "employee"){
                        return "Pegawai";
                    }elseif($data->work_type == "farmer"){
                        return "Petani";
                    }elseif($data->work_type == "housewife"){
                        return "Ibu Rumah Tangga";
                    }elseif($data->work_type == "government_employee"){
                        return "Pegawai Pemerintahan";
                    }elseif($data->work_type == "retired"){
                        return "Pensiunan";
                    }elseif($data->work_type == "student"){
                        return "Siswa/Mahasiswa";
                    }
                })
                ->addColumn('photo', function ($data) {
                    $photo = '<a target="_blank" href="'.asset('storage/'. $data->photo).'" class="badge badge-warning">Lihat Foto</a>';
                    return $photo;
                })
                ->rawColumns(['photo'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.data-penduduk.penduduk');
    }
}
