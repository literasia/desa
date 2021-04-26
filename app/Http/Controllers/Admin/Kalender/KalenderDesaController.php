<?php

namespace App\Http\Controllers\Admin\Kalender;

use App\Models\Admin\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\CategoryCalendar;
use Illuminate\Http\Request;

class KalenderDesaController extends Controller
{
    public function index(Request $request)
    {
        $datas = [];
        $category = CategoryCalendar::where('village_id', auth()->user()->village->id)->get();
        $nasional =  Kalender::where('kalenders.village_id', null)->orderBy('kalenders.created_at')->get();
        $data = Kalender::where('kalenders.village_id', auth()->user()->village->id)->orderBy('kalenders.created_at')->get();

       $original = $data->merge($nasional);    
        foreach ($original as $d) {
            $datas[] = (object) array('id' => $d->id, 'title' => $d->title, 'start' => $d->start_date . " " . $d->start_clock, 'end' => $d->end_date . " " . $d->end_clock, 'className' => $d->priority, 'category' => $d->category_name, 'description' => $d->description, 'location' => $d->location);
        }

        $events = json_encode($datas);

        return view('admin.kalender.kalender', compact('events','category'));
    }
    public function store(Request $request)
    {
        if ($request->prioritas == "Penting") {
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
            'category_name' => $request->category_calendar,
            'description' => $request->description,
            'location' => $request->location
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

        if($request->category_calendar){
            $category = $request->category_calendar;
        }else {
            $category = $check[0]->category_name;
        }

        if ($request->prioritas == "Penting") {
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
            'category_name' => $category,
            'description' => $request->description,
            'location' => $request->location
        ]);

        if ($update) {
            return response()
                ->json([
                    'success' => 'Data Updated.',
                ]);
        }
    }
}