<?php

namespace App\Http\Controllers\Admin\Struktur;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    private $rules = [
        'name' => ['required'],
        'nik' => ['required'],
        'nip' => ['required'],
        'username' => ['required'],
        'password' => ['required'],
    ];


    public function index(Request $request) {
        $data = Employee::where('village_id', auth()->user()->village->id)->get();
        if ($request->ajax()) {
            $data = Employee::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('photo', function ($data) {
                    $btnlink = '<a target="_blank" href="'.Storage::url($data->photo).'" class="badge badge-warning">Lihat Foto</a>';
                    return $btnlink;
                })
                ->rawColumns(['photo', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.struktur.pegawai');
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        $data['photo'] = null;
        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('pegawai', 'public');
        }

        Employee::create([
            'village_id' => auth()->user()->village->id,
            'name' => $data['name'],
            'nik' => $data['nik'],
            'nip' => $data['nip'],
            'username' => $data['username'],
            'password' => hash::make('password'),
            'photo' => $data['photo'],
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
        $data = Employee::find($id);
        return response()
            ->json([
                'id'   => $data->id,
                'name' => $data['name'],
                'nik' => $data['nik'],
                'nip' => $data['nip'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
            ]);
    }

    public function update(Request $request) {
        $data = $request->all();
        $employee = Employee::findOrFail($data['hidden_id']);

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }
        
        // kalau input photo tidak diisi
        $data['photo'] = $employee->photo;

        // jika file photo diisi
        if ($request->file('photo')) {
            // jika file photo yang lama ada di folder public maka photo nya dihapus
            if (Storage::disk('public')->exists($employee->photo)) {
                Storage::disk('public')->delete($employee->photo);
            }
            // ganti dengan photo baru yang telah diinput 
            $data['photo'] = $request->file('photo')->store('pegawai', 'public');
        }

        $employee->update([
            'village_id' => auth()->user()->village->id,
            'name' => $data['name'],
            'nik' => $data['nik'],
            'nip' => $data['nip'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'photo' => $data['photo']
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
        $employee = Employee::findOrFail($id);
        // jika file photo yang lama ada di folder public maka photo nya dihapus
        if (Storage::disk('public')->exists($employee->photo)) {
            Storage::disk('public')->delete($employee->photo);
        }
        $employee->delete();
    }
}
