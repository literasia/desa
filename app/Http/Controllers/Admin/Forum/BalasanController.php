<?php

namespace App\Http\Controllers\Admin\Forum;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Balasan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BalasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Controller::latest()->get();
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

        return view('admin.forum.balasan');
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
    public function store(Request $request) {
        // validasi
        $rules = [
           'balasan'  => 'required|max:100',
       ];

       $message = [
           'balasan.required' => 'Kolom ini tidak boleh kosong',
       ];

       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       $suku = Balasan::create([
           'village_id' => auth()->user()->village->id,
           'name'  => $request->input('balasan'),
       ]);

       return response()
           ->json([
               'success' => 'Data berhasil ditambahkan.',
           ]);
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function show(Balasan $balasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balasan $balasan
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        

        return view('admin.forum.balasan');
            // ->json([
            //     'balasan'  => $balasan
            // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        // validasi
        $rules = [
           'balasan'  => 'required|max:100',
       ];

       $message = [
           'balasan.required' => 'Kolom ini tidak boleh kosong',
       ];

       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       Balasan::whereId($request->input('hidden_id'))->update([
            'village_id' => auth()->user()->village->id,
            'name'  => $request->input('balasan'),
       ]);

       return response()
           ->json([
               'success' => 'Komentar Berhasil dikirim.',
           ]);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $delKategori = Balasan::find($id);
        $delKategori->delete();
    }
}
