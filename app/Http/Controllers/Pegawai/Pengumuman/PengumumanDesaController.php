<?php

namespace App\Http\Controllers\Pegawai\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Employee;
use Validator;

class PengumumanDesaController extends Controller
{
    public function index(Request $request)
    {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        if ($request->ajax()) {
            $data = Message::where('village_id', auth()->user()->village->id);
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
        return view('pegawai.pengumuman.pengumuman',["employee"=>$employee]);
        // return $data;
    }

    public function store(Request $request)
    {
        // validasi
        $rules = [
            'title'  => 'required|max:100',
            'message' => 'required',
        ];

        $message = [
            'title.required' => 'Kolom ini tidak boleh kosong',
            'message.required' => 'Kolom ini tidak boleh kosong',
        ];

        $notifikasi = "";
        if (in_array('notifikasi', $request->message_option)) {
            $notifikasi = 'Yes';
        } else {
            $notifikasi = 'No';
        }

        $dashboard = "";
        if (in_array('dashboard', $request->message_option)) {
            $dashboard = 'Yes';
        } else {
            $dashboard = 'No';
        }

        $start = "";
        if ($request->input('message_time') == 'Permanen') {
            $start = date("Y-m-d");
        } else {
            $start = $request->input('start_date');
        }

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Message::create([
            'title' => $request->input('title'),
            'notification' => $notifikasi,
            'dashboard' => $dashboard,
            'message_time' => $request->input('message_time'),
            'start_date' => $start,
            'end_date' => $request->input('end_date'),
            'message' => $request->input('message'),
            'status' => 'Aktif',
            'village_id' => auth()->user()->village->id
        ]);


        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $messages = Message::find($id);

        return response()
            ->json([
                'messages' => $messages,
            ]);
    }

    public function update(Request $req)
    {
        // validasi
        $rules = [
            'title'  => 'required|max:100',
            'message' => 'required',
        ];

        $message = [
            'title.required' => 'Kolom ini tidak boleh kosong',
            'message.required' => 'Kolom ini tidak boleh kosong',
        ];

        $notifikasi = "";
        if ($req->input('notifikasi') == 'Yes') {
            $notifikasi = 'Yes';
        } else {
            $notifikasi = 'No';
        }

        $dashboard = "";
        if ($req->input('dashboard') == 'Yes') {
            $dashboard = 'Yes';
        } else {
            $dashboard = 'No';
        }

        $start = "";
        if ($req->input('message_time') == 'Permanen') {
            $start = date("Y-m-d");
        } else {
            $start = $req->input('start_date');
        }

        $validator = Validator::make($req->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        $update = Message::where('id', $req->hidden_id)->update([
            'title' => $req->title,
            'notification' => $notifikasi,
            'dashboard' => $dashboard,
            'message_time' => $req->input('message_time'),
            'start_date' => $start,
            'end_date' => $req->input('end_date'),
            'message' => $req->input('message'),
            'status' => 'Aktif',
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $pesan = Message::find($id);
        $pesan->delete();
    }
}
