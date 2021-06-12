<?php

namespace App\Http\Controllers\Admin\SadarHukum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\User;
use Validator;
use App\Models\AwarenessLaw;
use Illuminate\Support\Facades\Auth;


class SadarhukumController extends Controller
{


    private $rules = [
        'title' => ['required'],
        'description' => ['required'],
        'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000']
    ];

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AwarenessLaw::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('file', function ($data) {
                    if($data->file == null){
                        $btnlink = " - ";
                    }else{
                        $btnlink = '<a target="_blank" href="'.Storage::url($data->file).'" class="badge badge-warning">Lihat Foto</a>';
                    }
                    return $btnlink;
                })
                ->rawColumns(['file', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.sadarhukum.sadarhukum');

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
            $data['image'] = $req->file('image')->store('sadar-hukum', 'public');
        }

        AwarenessLaw::create([
            'village_id' => auth()->user()->village->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'file' => $data['image']
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

   
    public function edit($id)
    {
        $data = AwarenessLaw::find($id);
        return response()
            ->json([
                'data' => $data
            ]);
    }


    public function update(Request $req) {
        $data = $req->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        $hukum = AwarenessLaw::findOrFail($data['hidden_id']);
        $data['image'] = null;
        if ($req->file('image')) {
            $data['image'] = $req->file('image')->store('sadar-hukum', 'public');
        }

        AwarenessLaw::whereId($data['hidden_id'])->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'file' => $data['image'] ?? $hukum->file
        ]);

        if ($req->file('image') && $hukum->image && Storage::disk('public')->exists($hukum->image)) {
            Storage::disk('public')->delete($hukum->image);
        }

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);

    }

  
    public function destroy($id)
    {
        $hukum = AwarenessLaw::find($id);
        $hukum->delete();
        if ($hukum->file && Storage::disk('public')->exists($hukum->file)) {
            Storage::disk('public')->delete($hukum->file);
        }
    }
}