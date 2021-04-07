<?php

namespace App\Http\Controllers\API;

use App\Models\Admin\Kalender;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;

class CalendarAPIController extends Controller
{
    public function getCalendar($village_id, Request $request)
    {
        $kalender = Kalender::select('id', 'title', 'start_date', 'end_date', 'start_clock', 'end_clock')
            ->where('village_id', "=", $village_id)
            ->whereBetween('start_date', [$request->start_date, $request->end_date])
            // ->whereRaw('? between start_date and end_date', [$request->tanggal_mulai])
            ->orderBy('start_date')->get();


        return response()->json(ApiResponse::success($kalender));
    }
}
