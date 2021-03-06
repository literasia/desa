<?php

namespace App\Http\Controllers\Pegawai\Kalender;

use App\Models\Admin\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\Employee;

class KegiatanDesaController extends Controller
{
    public function index(Request $request)
    {
        $datas = [];

        $data = Kalender::where('village_id', auth()->user()->village->id)->orderBy('created_at')->get();
        foreach ($data as $d) {
            $datas[] = (object) array('id' => $d->id, 'title' => $d->title, 'start' => $d->start_date . " " . $d->start_clock, 'end' => $d->end_date . " " . $d->end_clock, 'className' => $d->priority);
        }

        $events = json_encode($datas);
        $employee = Employee::where("user_id",auth()->user()->id)->first();

        return view('pegawai.kalender.kegiatan-desa', compact('events',"employee"));
    }
    public function store(Request $request)
    {

        if ($request->prioritas == "Sangat Penting") {
            $prioritas = "bg-danger";
        } else if ($request->prioritas == "Penting") {
            $prioritas = "bg-warning";
        } else if ($request->prioritas == "Wajib Datang") {
            $prioritas = "bg-primary";
        } else if ($request->prioritas == "Diharapkan Datang") {
            $prioritas = "bg-info";
        } else {
            $prioritas = "bg-success";
        }
        Kalender::create([
            'village_id' => auth()->user()->village->id,
            'title'        => $request->title,
            'start_date'    => $request->start_date,
            'end_date'    => $request->end_date,
            'start_clock'      => $request->start_clock,
            'end_clock' => $request->end_clock,
            'priority' => $prioritas,
        ]);
        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function destroy($id)
    {


        $delete = Kalender::find($id)->delete();

        if ($delete) {
            return response()
                ->json([
                    'success' => 'Data Deleted.',
                ]);
        }
    }

    public function update(Request $request, $id)
    {

        $check = Kalender::select('priority')->whereId($id)->get();


        if ($request->prioritas == "Sangat Penting") {
            $prioritas = "bg-danger";
        } else if ($request->prioritas == "Penting") {
            $prioritas = "bg-warning";
        } else if ($request->prioritas == "Wajib Datang") {
            $prioritas = "bg-primary";
        } else if ($request->prioritas == "Diharapkan Datang") {
            $prioritas = "bg-info";
        } else if ($request->prioritas == "Tidak Diwajibkan Datang") {
            $prioritas = "bg-success";
        } else {
            $prioritas = $check[0]->priority;
        }
        $update = Kalender::whereId($id)->update([
            'title'        => $request->title,
            'start_date'    => $request->start_date,
            'end_date'    => $request->end_date,
            'start_clock'      => $request->start_clock,
            'end_clock' => $request->end_clock,
            'priority' => $prioritas,
        ]);

        if ($update) {
            return response()
                ->json([
                    'success' => 'Data Updated.',
                ]);
        }
    }
}
