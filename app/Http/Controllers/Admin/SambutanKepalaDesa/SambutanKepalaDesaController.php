<?php

namespace App\Http\Controllers\Admin\SambutanKepalaDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Greeting;
use Validator;
use Illuminate\Support\Facades\Storage;

class SambutanKepalaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check_sambutan = Greeting::where('village_id', auth()->user()->village_id)->first();

        if ($check_sambutan == null) {
            Greeting::create([
                'title' => '...',
                'photo' => null,
                'content' => '...',
                'village_id' => auth()->user()->village_id,
            ]);
        }

        $sambutan_kepala_desa = Greeting::where('village_id', auth()->user()->village_id)->first();

        return view('admin.sambutan.sambutan')->with('sambutan_kepala_desa', $sambutan_kepala_desa);
    }

    /**
     * Update the specified resource in storage.
    nav*
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $sambutan_kepala_desa = Greeting::findOrFail($request->id);

        // $validator = Validator::make($data, $this->update_rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'error' => "Data masih kosong",
        //         'errors' => $validator->errors()
        //     ]);
        // }

        // kalau input photo tidak diisi
        $data['photo'] = $sambutan_kepala_desa->photo;

        // jika file photo diisi
        if ($request->file('photo')) {
            // jika file photo yang lama ada di folder public maka photo nya dihapus
            if (Storage::disk('public')->exists($sambutan_kepala_desa->photo)) {
                Storage::disk('public')->delete($sambutan_kepala_desa->photo);
            }
            // ganti dengan photo baru yang telah diinput
            $data['photo'] = $request->file('photo')->store('sambutan', 'public');
        }

        $sambutan_kepala_desa->update([
            'village_id' => auth()->user()->village->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'photo' => $data['photo'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);
    }
}
