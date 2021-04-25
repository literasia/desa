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
        $kalender = Kalender::where('village_id', $village_id)
            // ->whereBetween('start_date', [$request->start_date, $request->end_date])
            ->whereRaw('? between start_date and end_date', [$request->start_date])
            ->orderBy('start_date')->get();


        return response()->json(ApiResponse::success($kalender, "Success get data"));
    }
}
