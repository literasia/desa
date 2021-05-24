<?php

namespace App\Http\Controllers\Admin\BantuanSosial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialAssistanceType;
use Yajra\DataTables\DataTables;
use Validator;

class JenisBantuanSosialController extends Controller
{
    private $rules = [
        'name' => ['required'],
        'identity_number_status' => ['required'],
        'number_of_stages' => ['required'],
        'total' => ['required'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $social_assistance_type = SocialAssistanceType::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($social_assistance_type)
                ->addColumn('action', function ($social_assistance_type) {
                    $button = '<button type="button" id="'.$social_assistance_type->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$social_assistance_type->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->editColumn('total', function($social_assistance_type){
                    return 'Rp '. number_format($social_assistance_type->total);
                })
                ->editColumn('month', function($social_assistance_type){
                    return $social_assistance_type->month.' Bulan';
                })
                ->rawColumns(['action', 'total'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.bantuan-sosial.jenis-bantuan-sosial');
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

        SocialAssistanceType::create([
            'name' => $data['name'],
            'identity_number_status' => $data['identity_number_status'],
            'number_of_stages' => $data['number_of_stages'],
            'total' => $data['total'],
            'village_id' => auth()->user()->village_id,
            'month' => $data['month']
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
        $data = SocialAssistanceType::find($id);
        return response()
            ->json([
                'id' => $data->id,
                'name' => $data['name'],
                'identity_number_status' => $data['identity_number_status'],
                'number_of_stages' => $data['number_of_stages'],
                'total' => $data['total'],
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

        $social_assistance_type = SocialAssistanceType::findOrFail($data['hidden_id']);

        $social_assistance_type->update([
            'name' => $data['name'],
            'identity_number_status' => $data['identity_number_status'],
            'number_of_stages' => $data['number_of_stages'],
            'total' => $data['total'],
            'village_id' => auth()->user()->village_id,
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
        $social_assistance_type = SocialAssistanceType::findOrFail($id);
        $social_assistance_type->delete();
    }
}
