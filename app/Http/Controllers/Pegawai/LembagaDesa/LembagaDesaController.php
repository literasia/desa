<?php

namespace App\Http\Controllers\Pegawai\LembagaDesa;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\CommunityType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use App\Models\{Citizen, Family};
use App\{User, Role};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class LembagaDesaController extends Controller
{
    public function index(Request $request)
    {   
        $type = CommunityType::where('village_id', auth()->user()->village->id)->orderByDesc('created_at')->get();
        $citizen = Citizen::where('village_id', auth()->user()->village->id)->get();
        
       
        if ($request->ajax()) {
            $data = Community::select('community_types.id as com_id','communities.id','community_types.community_name', 'citizens.name', 'communities.position', 'communities.entrydate')->where('communities.village_id', auth()->user()->village->id)->join('citizens', 'citizens.user_id', 'communities.user_id')
            ->join('community_types', 'community_types.id', 'communities.community_type_id')->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $data = Pesan::where('user_id', Auth::id())->get();
        return view('pegawai.lembagadesa.lembagadesa', compact('type', 'citizen'));
        // return $data;
    }

    public function store(Request $request)
    {
        // validasi
        $rules = [
            'name'  => 'required',
            'position' => 'required',
            'lembaga' => 'required',
            'start_date' => 'required',
        ];

        $message = [
            'name.required' => 'Kolom ini tidak boleh kosong',
            'position.required' => 'Kolom ini tidak boleh kosong',
            'lembaga.required' => 'Kolom ini tidak boleh kosong',
            'start_date.required' => 'Kolom ini tidak boleh kosong',
        ];


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Community::create([
            'user_id' => $request->name,
            'position' => $request->position,
            'community_type_id' => $request->lembaga,
            'entrydate' => $request->start_date,
            'village_id' => auth()->user()->village->id
        ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $community = Community::select('communities.id','community_types.id as com_id', 'citizens.user_id', 'communities.position', 'communities.entrydate')->where('communities.village_id', auth()->user()->village->id)->join('citizens', 'citizens.user_id', 'communities.user_id')
        ->join('community_types', 'community_types.id', 'communities.community_type_id')->where('communities.id',$id)->get();

        return response()
            ->json([
                'community' => $community,
            ]);
    }

    public function view($id)
    {
        $community = Community::select('community_types.community_name', 'citizens.name', 'communities.position', 'communities.entrydate')->where('communities.village_id', auth()->user()->village->id)->join('citizens', 'citizens.user_id', 'communities.user_id')
        ->join('community_types', 'community_types.id', 'communities.community_type_id')->where('community_types.id',$id)->get();

        return response()
            ->json([
                'community' => $community,
            ]);
    }

    public function addCitizen(Request $request)
    {
        $rules = [
            'name'  => 'required|max:100',
            'no_kk' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];

        $message = [
            'name.required'  => 'This column cannot be empty',
            'no_kk.required' => 'This column cannot be empty',
            'nik.required' => 'This column cannot be empty',
            'email.required' => 'This column cannot be empty',
            'phone.required' => 'This column cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        // kalau input photo tidak diisi
        $photo = NULL;

        // jika file photo diisi
        if ($request->file('photo')) {
            // jika file photo yang lama ada di folder public maka photo nya dihapus
            if (Storage::disk('public')->exists($request->photo)) {
                Storage::disk('public')->delete($request->photo);
            }
            // ganti dengan photo baru yang telah diinput 
            $photo = $request->file('photo')->store('penduduk', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'username' => str_replace(' ', '_', strtolower($request->username)),
            'email' => $request->email,
            'password' => hash::make($request->password),
            'village_id' => $request->auth()->user()->village->id,
        ]);
            
        $user_id = User::findOrFail($user->id);

        // get Roles to attach user roles
        $role = Role::where('name', 'user')->first();

        // attach
        $user_id->roles()->attach($role->id);

        $citizen = Citizen::create([
            "village_id" => $request->village_id,
            "name" => $request->name,
            "user_id" => $user->id,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'email' => $request->email,
            'phone' => $request->phone,
            'citizenship' => $request->citizenship,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'sex' => $request->sex,
            'religion' => $request->religion,
            'education' => $request->education,
            'marital_status' => $request->marital_status,
            'family_status' => $request->family_status,
            'work_type' => $request->work_type,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'address' => $request->address,
            'is_head_of_family' => $request->is_head_of_family,
            'photo' => $photo,
        ]);

        
        // jika status kepala keluarga
        if ($request->is_head_of_family) {
            Family::create([
                'village_id' => $request->village_id,
                'citizen_id' => $citizen->id
            ]);
        }

        return response()->json(ApiResponse::success($citizen, 'Success add data'));
    }


    public function update(Request $request)
    {
        // validasi
        $rules = [
            'name'  => 'required',
            'position' => 'required',
            'lembaga' => 'required',
            'start_date' => 'required',
        ];

        $message = [
            'name.required' => 'Kolom ini tidak boleh kosong',
            'position.required' => 'Kolom ini tidak boleh kosong',
            'lembaga.required' => 'Kolom ini tidak boleh kosong',
            'start_date.required' => 'Kolom ini tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $update = Community::where('id', $request->hidden_id)->update([
            'user_id' => $request->name,
            'position' => $request->position,
            'community_type_id' => $request->lembaga,
            'entrydate' => $request->start_date,
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = Community::find($id);
        $pesan->delete();
    }
}