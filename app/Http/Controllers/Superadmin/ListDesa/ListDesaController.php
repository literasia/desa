<?php

namespace App\Http\Controllers\Superadmin\ListDesa;

use App\Role;
use App\User;
use App\Models\Addon;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ListDesaController extends Controller
{
    private $rules = [
        'username' => 'required',
        'password' => 'required|confirmed',
    ];

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::whereHas('roles' , function($q){
                $q->whereName('admin');
             })->get();

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn("village_name", function($data){
                    return $data->village->name;
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('superadmin.list-desa.list-desa');
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, $this->rules);



        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        $user = User::create([
            "name" => "Admin Desa",
            "village_id"=> 1101010001,
            'username' => str_replace(' ', '_', strtolower($data['username'])),
            'password' => hash::make($data['password']),
        ]);


        $user_id = User::findOrFail($user->id);

        $role = Role::where("name", "admin")->first();

        $user_id->roles()->attach($role->id);

        $addon = ["village_id"=> 1101010001, "admin_id"=> $user->id];
        foreach ($data as $key => $value ) {
            if(strpos($key,"addon")){
                $pisah = explode("-",$key);
                $addon[$pisah[2]] = 1;
            }
        }

        Addon::create($addon);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request, $id)
    {

    }
}
