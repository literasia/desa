<?php

namespace App\Http\Controllers\Pegawai\WisataDesa;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\VillageTour;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;

class VillageTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = VillageTour::where('village_id', auth()->user()->village->id)->get();
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        if ($request->ajax()) {
            $data = VillageTour::where('village_id', auth()->user()->village->id)->get();
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
        return view('pegawai.wisata-desa.wisata-desa', ["employee" => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $rules = [
            'name'          => 'required|max:30',
            'address'       => 'required|max:30',
            'day_open'      => 'required|max:30',
            'time_opening'  => 'required|max:30',
            'time_closing'  => 'required|max:30',
            'tour_type'     => 'required|max:30',
            'no_phone'      => 'required|max:13',
            'information'   => 'nullable|max:50',
        ];

        $message = [
            'name.required'         => 'Kolom ini tidak boleh kosong',
            'address.required'      => 'Kolom ini tidak boleh kosong',
            'day_open.required'     => 'Kolom ini tidak boleh kosong',
            'time_opening.required' => 'Kolom ini tidak boleh kosong',
            'time_closing.required' => 'Kolom ini tidak boleh kosong',
            'tour_type.required'    => 'Kolom ini tidak boleh kosong',
            'no_phone.required'     => 'Kolom ini tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        VillageTour::create([
            'village_id'    => auth()->user()->village->id,
            'name'          => $request->input('name'),
            'address'       => $request->input('address'),
            'day_open'      => $request->input('day_open'),
            'time_opening'  => $request->input('time_opening'),
            'time_closing'  => $request->input('time_closing'),
            'tour_type'     => $request->input('tour_type'),
            'no_phone'      => $request->input('no_phone'),
            'information'   => $request->input('information'),
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VillageTour  $villageTour
     * @return \Illuminate\Http\Response
     */
    public function show(VillageTour $villageTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VillageTour  $villageTour
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = VillageTour::find($id);

        return response()
            ->json([
                'id'            => $data->id,
                'name'          => $data->name,
                'address'       => $data->address,
                'day_open'      => $data->day_open,
                'time_opening'  => $data->time_opening,
                'time_closing'  => $data->time_closing,
                'tour_type'     => $data->tour_type,
                'no_phone'      => $data->no_phone,
                'information'   => $data->information,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VillageTour  $villageTour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $data = $request->all();
        // validasi
        $rules = [
            'name'          => 'required|max:30',
            'address'       => 'required|max:30',
            'day_open'      => 'required|max:30',
            'time_opening'  => 'required|max:30',
            'time_closing'  => 'required|max:30',
            'tour_type'     => 'required|max:30',
            'no_phone'      => 'required|max:13',
            'information'   => 'nullable|max:50',
        ];

        $message = [
            'name.required'         => 'Kolom ini tidak boleh kosong',
            'address.required'      => 'Kolom ini tidak boleh kosong',
            'day_open.required'     => 'Kolom ini tidak boleh kosong',
            'time_opening.required' => 'Kolom ini tidak boleh kosong',
            'time_closing.required' => 'Kolom ini tidak boleh kosong',
            'tour_type.required'    => 'Kolom ini tidak boleh kosong',
            'no_phone.required'     => 'Kolom ini tidak boleh kosong',
        ];

       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       VillageTour::whereId($request->input('hidden_id'))->update([
            'village_id' => auth()->user()->village->id,
            'name'          => $request->input('name'),
            'address'       => $request->input('address'),
            'day_open'      => $request->input('day_open'),
            'time_opening'  => $request->input('time_opening'),
            'time_closing'  => $request->input('time_closing'),
            'tour_type'     => $request->input('tour_type'),
            'no_phone'      => $request->input('no_phone'),
            'information'   => $request->input('information'),
       ]);

       return response()
           ->json([
               'success' => 'Data berhasil diupdate.',
           ]);
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VillageTour  $villageTour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $del = VillageTour::find($id);
        $del->delete();
    }
}
