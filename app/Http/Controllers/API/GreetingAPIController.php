<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Greeting;
use App\Utils\ApiResponse;

class GreetingAPIController extends Controller
{
    public function getGreeting($village_id){        
        $greeting = Greeting::get();

        $greeting = $greeting->where('village_id', $village_id)->first();
        return response()->json(ApiResponse::success($greeting));
    }
}
