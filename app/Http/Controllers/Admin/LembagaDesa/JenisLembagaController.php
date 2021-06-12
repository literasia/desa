<?php

namespace App\Http\Controllers\Admin\LembagaDesa;

use App\Http\Controllers\Controller;
use App\Models\CommunityType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use Illuminate\Support\Facades\Storage;

class JenisLembagaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CommunityType::where('village_id', auth()->user()->village->id)->orderByDesc('created_at')->get();
            return DataTables::of($data)
                ->addColumn('logo', function ($data) {
                    if($data->logo){
                        $image = '<a href="'. Storage::url($data->logo).'" class="text-success"><i class="fa fa-check-circle mr-2"></i>Uploaded</a>';
                    }else{
                        $image = " - ";
                    }
                    return $image;
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action', 'logo'])
                ->addIndexColumn()
                ->make(true);
        }
        // $data = Pesan::where('user_id', Auth::id())->get();
        return view('admin.lembagadesa.jenislembaga',);
        // return $data;
    }

    public function store(Request $request)
    {
         // validasi
         $rules = [
            'community_name'  => 'required',
            'vm' => 'required',
            'description' => 'required'
        ];

        $message = [
            'community_name.required' => 'Kolom name ini tidak boleh kosong',
            'vm.required' => 'Kolom visi misi ini tidak boleh kosong',
            'description.required' => 'Kolom deskripsi ini tidak boleh kosong',

        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $data['image'] = null;
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('lembaga', 'public');
        }

        CommunityType::create([
            'community_name' => $request->community_name,
            'visionandmission' => $request->vm,
            'description' => $request->description,
            'logo' => $data['image'],
            'village_id' => auth()->user()->village->id
        ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $type = CommunityType::find($id);

        return response()
            ->json([
                'type' => $type,
            ]);
    }

    public function update(Request $request)
    {
         // validasi
         $rules = [
            'community_name'  => 'required',
            'vm' => 'required',
            'description' => 'required'
        ];

        $message = [
            'community_name.required' => 'Kolom name ini tidak boleh kosong',
            'vm.required' => 'Kolom visi misi ini tidak boleh kosong',
            'description.required' => 'Kolom deskripsi ini tidak boleh kosong',

        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $berita = CommunityType::findOrFail($request->hidden_id);
        $data['image'] = null;
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('lembaga', 'public');
        }

        $update = CommunityType::where('id', $request->hidden_id)->update([
            'community_name' => $request->community_name,
            'visionandmission' => $request->vm,
            'description' => $request->description,
            'logo' => $data['image'],
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = CommunityType::find($id);
        $pesan->delete();
    }
}