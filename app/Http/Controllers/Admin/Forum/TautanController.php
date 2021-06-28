<?php

namespace App\Http\Controllers\Admin\Forum;

use Validator;
use App\Models\BagianPegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Addons;

class TautanController extends Controller
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

        return view('admin.forum.tautan');
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
        
        //
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function show(Tautan $tautan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) 
    {        
        //
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        //
    }
}