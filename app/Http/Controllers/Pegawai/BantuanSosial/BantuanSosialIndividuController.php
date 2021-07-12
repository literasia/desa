<?php

namespace App\Http\Controllers\Pegawai\BantuanSosial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{SocialAssistanceIndividu, SocialAssistanceType, Citizen};
use Yajra\DataTables\DataTables;
use Validator;

class BantuanSosialIndividuController extends Controller
{
    private $rules = [
        
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $citizens = Citizen::where('village_id', auth()->user()->village->id)->get();
        $social_assistance_types = SocialAssistanceType::where('village_id', auth()->user()->village->id)->get();

        if ($request->ajax()) {
            $social_assistance_individu = SocialAssistanceIndividu::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($social_assistance_individu)
                ->addColumn('action', function ($social_assistance_individu) {
                    $button = '<button type="button" id="'.$social_assistance_individu->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$social_assistance_individu->id.'" class="edit-status btn btn-mini btn-primary shadow-sm">Status</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$social_assistance_individu->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('no_kk', function($social_assistance_individu){
                    return $social_assistance_individu->citizen->no_kk;
                })
                ->addColumn('nik', function($social_assistance_individu){
                    return $social_assistance_individu->citizen->nik;
                })
                ->addColumn('id_dtks', function($social_assistance_individu){
                    return $social_assistance_individu->id_dtks.'<br/>'.$social_assistance_individu->id_art;
                })
                ->addColumn('nama_penerima', function($social_assistance_individu){
                    return $social_assistance_individu->citizen->name;
                })
                ->addColumn('jenis_bantuan', function($social_assistance_individu){
                    return $social_assistance_individu->socialAssistanceType->name;
                })
                ->addColumn('tahap', function($social_assistance_individu){
                    return $social_assistance_individu->socialAssistanceType->number_of_stages.' kali dalam '. 
                    $social_assistance_individu->socialAssistanceType->month.' bulan';
                })
                ->addColumn('total', function($social_assistance_individu){
                    return 'Rp'. number_format($social_assistance_individu->socialAssistanceType->total);
                })
                ->addColumn('status_penerimaan', function($social_assistance_individu){
                    if ($social_assistance_individu->status_penerimaan == 'selesai') {
                        return '<label class="label label-sm label-success">'.$social_assistance_individu->status_penerimaan.'</label>';
                    }else if($social_assistance_individu->status_penerimaan == 'belum'){
                        return '<label class="label label-sm label-danger">'.$social_assistance_individu->status_penerimaan.'</label>';
                    }else{
                        return '<label class="label label-sm label-info">'.$social_assistance_individu->status_penerimaan.'</label>';
                    } 
                })
                ->rawColumns(['action', 'id_dtks', 'tahap', 'status_penerimaan'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pegawai.bantuan-sosial.bantuan-sosial-individu')->with('citizens', $citizens)
                                                                   ->with('social_assistance_types', $social_assistance_types);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        SocialAssistanceIndividu::create([
            'citizen_id' => $data['citizen_id'],            
            'social_assistance_type_id' => $data['social_assistance_type_id'],
            'id_art' => $data['id_art'],
            'id_dtks' => $data['id_dtks'],
            'status_penerimaan' => 'belum',
            'village_id' => auth()->user()->village_id,
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SocialAssistanceIndividu::find($id);
        $social_assistance_types = SocialAssistanceType::find($data['social_assistance_type_id']);
        $citizen = Citizen::findOrFail($data->citizen_id);
        return response()
            ->json([
                'id' => $data->id,
                'citizen_id' => $citizen['id'],            
                'name' => $citizen['name'],
                'no_nik' => $citizen['no_nik'],
                'social_assistance_type_id' => $data['social_assistance_type_id'],
                'number_of_stages' => $social_assistance_types['number_of_stages'],
                'id_art' => $data['id_art'],
                'id_dtks' => $data['id_dtks'],
                'status_penerimaan' => $data['status_penerimaan'],
                'village_id' => auth()->user()->village_id,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        $social_assistance_individu = SocialAssistanceIndividu::findOrFail($data['hidden_id']);

        $social_assistance_individu->update([
            'citizen_id' => $data['citizen_id'],            
            'social_assistance_type_id' => $data['social_assistance_type_id'],
            'village_id' => auth()->user()->village_id,
            'id_art' => $data['id_art'],
            'id_dtks' => $data['id_dtks'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);
    }

    public function updateStatus(Request $request){
        $social_assistance_individu = SocialAssistanceIndividu::findOrFail($request->hidden_id);

        $social_assistance_individu->update([
            'status_penerimaan' => $request->status_penerimaan,
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social_assistance_individu = SocialAssistanceIndividu::findOrFail($id);
        $social_assistance_individu->delete();
    }
}
