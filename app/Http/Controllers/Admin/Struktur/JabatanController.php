<?php

namespace App\Http\Controllers\Admin\Struktur;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Position;

class JabatanController extends Controller
{
    private $rules = [
        'name' => ['required'],
    ];

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Position::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.struktur.jabatan');
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        Position::create([
            'village_id' => auth()->user()->village->id,
            'name' => $data['name'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Position::find($id);
        return response()
            ->json([
                'id'   => $data->id,
                'name' => $data['name'],
            ]);
    }

    public function update(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        $position = Position::findOrFail($data['hidden_id']);

        $position->update([
            'village_id' => auth()->user()->village->id,
            'name' => $data['name'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
    }

    
}