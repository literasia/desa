<?php

namespace App\Http\Controllers\Admin\Kampanye;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Campaign;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{   

    private $rules = [
        'candidate' => ['required'],
        'deputy_candidate' => ['required'],
        'vision' => ['required'],
        'mission' => ['required'],
        'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000']
    ];

    public function index(Request $request)
    {
        $data = Campaign::latest()->get();
        if ($request->ajax()) {
            $data = Campaign::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('image', function ($data) {
                    $btnlink = '<a target="_blank" href="'.Storage::url($data->image).'">Lihat Foto</a>';
                    return $btnlink;
                })  
                ->rawColumns(['image', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.kampanye.kampanye');
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        $data['image'] = null;
        if ($req->file('image')) {
            $data['image'] = $req->file('image')->store('kampanye', 'public');
        }

        Campaign::create([
            'village_id' => auth()->user()->village->id,
            'candidate' => $data['candidate'],
            'deputy_candidate' => $data['deputy_candidate'],
            'vision' => $data['vision'],
            'mission' => $data['mission'],
            'image' => $data['image']
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    public function edit($id)
    {
        $data = Campaign::find($id);
        return response()
            ->json([
                'id'                => $data->id,
                'candidate'         => $data->candidate,
                'deputy_candidate'  => $data->deputy_candidate,
                'vision'            => $data->vision,
                'mission'           => $data->mission,
                'image'             => $data->image,
            ]);
    }

    public function update(Request $req) {
        $data = $req->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }
        // dd($data['hidden_id']);

        $kampanye = Campaign::findOrFail($data['hidden_id']);
        $data['image'] = null;
        if ($req->file('image')) {
            $data['image'] = $req->file('image')->store('kampanye', 'public');
        }


        Campaign::whereId($data['hidden_id'])->update([
            'village_id' => auth()->user()->village->id,
            'candidate' => $data['candidate'],
            'deputy_candidate' => $data['deputy_candidate'],
            'vision' => $data['vision'],
            'mission' => $data['mission'],
            'image' => $data['image'] ?? $kampanye->image
        ]);

        if ($req->file('image') && $kampanye->image && Storage::disk('public')->exists($kampanye->image)) {
            Storage::disk('public')->delete($kampanye->image);
        }

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);

    }

    public function destroy($id)
    {
        $kampanye = Campaign::find($id);
        $kampanye->delete();
        if ($kampanye->image && Storage::disk('public')->exists($kampanye->image)) {
            Storage::disk('public')->delete($kampanye->image);
        }
    }
}
