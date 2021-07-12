<?php

namespace App\Http\Controllers\Pegawai\SadarHukum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;
use Validator;
use App\Models\Citizen;
use App\Models\MemberAwarenessLaw;
use Illuminate\Support\Facades\Auth;


class MemberSadarHukumController extends Controller
{

    public function index(Request $request)
    {
        $citizen = Citizen::where('village_id', auth()->user()->village_id)->get();
        
        
        
        if ($request->ajax()) {
            $data = MemberAwarenessLaw::select('member_awareness_laws.id', 'citizens.name', 'member_awareness_laws.position', 'member_awareness_laws.entrydate')
                                ->where('member_awareness_laws.village_id', auth()->user()->village->id)
                                ->join('citizens', 'citizens.user_id', 'member_awareness_laws.user_id')
                                ->get();
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

        return view('pegawai.sadarhukum.membersadarhukum', compact('citizen'));

    }

    public function store(Request $request)
    {
        // validasi
        $rules = [
            'name'  => 'required',
            'position' => 'required',
            'start_date' => 'required',
        ];

        $message = [
            'name.required' => 'Kolom name tidak boleh kosong',
            'position.required' => 'Kolom posisi tidak boleh kosong',
            'start_date.required' => 'Kolom tanggal masuk tidak boleh kosong',
        ];


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        MemberAwarenessLaw::create([
            'user_id' => $request->name,
            'position' => $request->position,
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
        $hukum = MemberAwarenessLaw::select('member_awareness_laws.id', 'citizens.user_id', 'member_awareness_laws.position', 'member_awareness_laws.entrydate')
        ->where('member_awareness_laws.village_id', auth()->user()->village->id)
        ->join('citizens', 'citizens.user_id', 'member_awareness_laws.user_id')
        ->where('member_awareness_laws.id',$id)->get();

        return response()
            ->json([
                'hukum' => $hukum,
            ]);
    }


    public function update(Request $request)
    {
        // validasi
        $rules = [
            'name'  => 'required',
            'position' => 'required',
            'start_date' => 'required',
        ];

        $message = [
            'name.required' => 'Kolom ini tidak boleh kosong',
            'position.required' => 'Kolom ini tidak boleh kosong',
            'start_date.required' => 'Kolom ini tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $update = MemberAwarenessLaw::where('id', $request->hidden_id)->update([
            'user_id' => $request->name,
            'position' => $request->position,
            'entrydate' => $request->start_date,
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = MemberAwarenessLaw::find($id);
        $pesan->delete();
    }
}