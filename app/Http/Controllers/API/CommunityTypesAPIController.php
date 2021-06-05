<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunityType;
use App\Utils\ApiResponse;

class CommunityTypesAPIController extends Controller
{
    public function getTypes($village_id)
    {
        $community = CommunityType::where('village_id', $village_id)->orderByDesc('created_at')->get();

        return response()->json(ApiResponse::success($community, 'Success get data'));
    }
}
