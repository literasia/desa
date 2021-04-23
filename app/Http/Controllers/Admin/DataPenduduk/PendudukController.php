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
                    switch ($data->family_status) {
                        case 'husband':
                            return 'Suami/Ayah';
                            break;
                        case 'wife':
                            return 'Istri/Ibu';
                            break;
                        case 'son_in_law':
                            return 'Menantu';
                            break;
                        case 'child':
                            return 'Anak';
                            break;
                        case 'grandchild':
                            return 'Cucu';
                            break;
                        case 'in_laws':
                            return 'Mertua';
                            break;
                        case 'other family':
                            return 'Famili Lain';
                            break;
                        case 'etc':
                            return 'Lainnya';
                            break;
                        default:
                            # code...
                            break;
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
                    switch ($data->work_type) {
                        case 'housewife':
                            return "Ibu Rumah Tangga";
                            break;
                        case 'student':
                            return "Murid/Mahasiswa";
                            break;
                        case 'retired':
                            return "Pensiunan";
                            break;
                        case 'government_employee':
                            return "Pegawai Pemerintahan";
                            break;
                        case 'honorary_employee':
                            return "Pegawai Honorer/Swasta";
                            break;
                        case 'police':
                            return "Polisi RI";
                            break;
                        case 'army':
                            return "TNI";
                            break;
                        case 'farmer':
                            return "Petani";
                            break;
                        case 'fisherman':
                            return "Nelayan";
                            break;
                        case 'industry':
                            return "Industri";
                            break;
                        case 'contruction':
                            return "Konstruksi";
                            break;
                        case 'transportation':
                            return "Transportasi";
                            break;
                        case 'street_vendors':
                            return "Pedagang Kaki Lima";
                            break;
                        case 'laborer':
                            return "Buruh";
                            break;
                        case 'housemaid':
                            return "Pembantu";
                            break;
                        case 'barber':
                            return "Tukang Pangkas";
                            break;
                        case 'electrican':
                            return "Tukang Listrik";
                            break;
                        case 'briklayer':
                            return "Tukang Batu";
                            break;
                        case 'carpenter':
                            return "Tukang Kayu";
                            break;
                        case 'cobler':
                            return "Tukang Sol Sepatu";
                            break;
                        case 'blacksmith':
                            return "Pandai Besi";
                            break;
                        case 'tailor':
                            return "Penjahit";
                            break;
                        case 'hairdresser':
                            return "Penata Rambut";
                            break;
                        case 'makeup_man':
                            return "Penata Rias";
                            break;
                        case 'fashion_stylist':
                            return "Penata Busana";
                            break;
                        case 'mechanics':
                            return "Mekanik";
                            break;
                        case 'dentist':
                            return "Dokter Gigi";
                            break;
                        case 'artist':
                            return "Seniman";
                            break;
                        case 'physician':
                            return "Tabib";
                            break;
                        case 'fashion_designer':
                            return "Perancang Busana";
                            break;
                        case 'translator':
                            return "Penerjemah";
                            break;
                        case 'mosque_imam':
                            return "Imam Masjid";
                            break;
                        case 'pastor':
                            return "Pastur";
                            break;
                        case 'journalists':
                            return "Jurnalis";
                            break;
                        case 'chef':
                            return "Tukang Masak";
                            break;
                        case 'driver':
                            return "Pengemudi";
                            break;
                        case 'president':
                            return "Presiden";
                            break;
                        case 'vice_president':
                            return "Wakil Presiden";
                            break;
                        case 'members_of_the_supreme_court':
                            return "Anggota Mahkamah Agung";
                            break;
                        case 'members_of_cabinet_minister':
                            return "Anggota Menteri Kabinet";
                            break;
                        case 'ambassador':
                            return "Duta Besar";
                            break;
                        case 'governer':
                            return "Gubernur";
                            break;
                        case 'deputy_governor':
                            return "Wakil Gubernur";
                            break;
                        case 'regent':
                            return "Bupati";
                            break;
                        case 'vice_regent':
                            return "Wakil Gubernur";
                            break;
                        case 'mayor':
                            return "Wakil Walikota";
                            break;
                        case 'vice_mayor':
                            return "Wakil Walikota";
                            break;
                        case 'lecturer':
                            return "Dosen";
                            break;
                        case 'pilot':
                            return "Pilot";
                            break;
                        case 'lawyer':
                            return "Pengacara";
                            break;
                        case 'notary_public':
                            return "Notaris";
                            break;
                        case 'arsitect':
                            return "Arsitect";
                            break;
                        case 'accountant':
                            return "Akuntan";
                            break;
                        case 'consultant':
                            return "konsultan";
                            break;
                        case 'docter':
                            return "Dokter";
                            break;
                        case 'nurse':
                            return "Perawat";
                            break;
                        case 'midwife':
                            return "Bidan";
                            break;
                        case 'television_broadcaster':
                            return "Penyiar Televisi";
                            break;
                        case 'radio_announcer':
                            return "Penyiar Radio";
                            break;
                        case 'sailor':
                            return "Pelaut";
                            break;
                        case 'researcher':
                            return "Penilti";
                            break;
                        case 'pharmacist':
                            return "Apoteker";
                            break;
                        case 'psychiatrist':
                            return "Psikiater";
                            break;
                        case 'broker':
                            return "Makelar";
                            break;
                        case 'paranormal':
                            return "Paranormal";
                            break;
                        case 'village_apparatus':
                            return "Perangkat Desa";
                            break;
                        case 'village_head':
                            return "Kepala Desa";
                            break;
                        case 'nun':
                            return "Biarawati";
                            break;
                        
                        default:
                            # code...
                            break;
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
