<?php

namespace App\Http\Controllers\Superadmin\Kalender;

use App\Models\Admin\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class KalenderSuperadminController extends Controller
{
    public function index(Request $request)
    {
        $datas = [];

        $data = Kalender::where('kalenders.village_id', null)->orderBy('kalenders.created_at')->get();
        foreach ($data as $d) {
            $datas[] = (object) array('id' => $d->id, 'title' => $d->title, 'start' => $d->start_date . " " . $d->start_clock, 'end' => $d->end_date . " " . $d->end_clock, 'className' => $d->priority, 'category' => $d->category_name, 'description' => $d->description, 'location' => $d->location);
        }

        $events = json_encode($datas);

        return view('superadmin.kalender.kalender', compact('events'));
    }
    public function store(Request $request)
    {
        Kalender::create([
            'title'        => $request->title,
            'start_date'    => $request->start_date,
            'end_date'    => $request->end_date,
            'start_clock'      => $request->start_clock,
            'end_clock' => $request->end_clock,
            'priority' => "bg-danger",
            'description' => "Hari Libur Nasional",
            'category_name' => "Libur Nasional",
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

        $check = Kalender::select('priority','category_name')->whereId($id)->get();


        $update = Kalender::whereId($id)->update([
            'title'        => $request->title,
            'start_date'    => $request->start_date,
            'end_date'    => $request->end_date,
            'start_clock'      => $request->start_clock,
            'end_clock' => $request->end_clock,
            'description' => $request->description,
            'priority' => $prioritas = $check[0]->priority
        ]);

        if ($update) {
            return response()
                ->json([
                    'success' => 'Data Updated.',
                ]);
        }
    }
}