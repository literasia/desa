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
        $villages = VillageProfile::join('village_galleries', 'village_galleries.village_id', 'village_profiles.village_id',)
                                    ->get();

        return response()->json(ApiResponse::success($villages));
    }
}