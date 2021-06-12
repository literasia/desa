<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AwarenessLaw;
use App\Utils\ApiResponse;

class AwarenessLawAPIController extends Controller
{
    public function getLaw($village_id)
    {
        $law = AwarenessLaw::where('village_id', $village_id)->orderByDesc('created_at')->get();

        return response()->json(ApiResponse::success($law, 'Success get data'));
    }
}
