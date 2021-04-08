<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index($village_id)
    {
    	$sliders    = DB::table('sliders')->where('village_id',$village_id)
    	->whereRaw("'".date("Y-m-d")."' between start_date and end_date")->get();
    	// dd(date("Y-m-d"));
    	return response()->json(ApiResponse::success($sliders));
    }
}
