<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VillageProfile;
use App\Utils\ApiResponse;

class VillageProfileController extends Controller
{
    public function getProfile($village_id)
    {
        $villages = VillageProfile::where('village_id', $village_id)->get();

        return response()->json(ApiResponse::success($villages));
    }
}
