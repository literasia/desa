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
        'village_id' => 'required',
    ];

    private $updaterules = [
        'password' => 'confirmed'
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
            "village_id"=> $data["village_id"],
            'username' => str_replace(' ', '_', strtolower($data['username'])),
            'password' => hash::make($data['password']),
        ]);


        $user_id = User::findOrFail($user->id);

        $role = Role::where("name", "admin")->first();

        $user_id->roles()->attach($role->id);

        $addon = ["village_id"=> $data["village_id"], "admin_id"=> $user->id];
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
        $data = User::findOrFail($id);

        return response()->json(["user" => $data, "addon" =>$data->addon]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->updaterules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $addon = Addon::where("admin_id",$data['hidden_id'])->first();
        $update = [
            "administration"=>0,
            "announcement"=>0,
            "attendance"=>0,
            "calendar"=>0,
            "campaign"=>0,
            "complaint"=>0,
            "dashboard"=>0,
            "event"=> 0,
            "finance"=>0,
            "guest_book"=>0,
            "library"=>0,
            "log_user"=>0,
            "news"=>0,
            "population_data"=>0,
            "reference"=>0,
            "slider"=>0,
            "template"=>0,
            "village_potency"=>0,
            "village_profile"=>0,
            "village_structure"=>0,
            "village_tour"=>0,
            "social_assistance"=>0,
            "greeting"=>0,
            "community"=>0,
            "awareness"=>0,
            "development"=>0
        ];

        if($data["password"] !== null){
            $user = User::findOrFail($data["hidden_id"]);
            $user->update([
             'password' => hash::make($data['password'])
            ]);
        }

        foreach ($data as $key => $value ) {
            if(strpos($key,"addon")){
                $pisah = explode("-",$key);
                $update[$pisah[2]] = 1;
            }
        }
        dd($update);

        $succes = $addon->update($update);

        return response()->json(["success" => $succes]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $role = Role::where('name', 'admin')->first();
        $addon = Addon::where("admin_id",$id);
        $user->roles()->detach($role->id);
        $user->delete();
        $addon->delete();
        return response()->json(["success" => true]);

    }
}
