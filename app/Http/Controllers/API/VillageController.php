<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Utils\ApiResponse;

class VillageController extends Controller
{
    public function search($keyword)
    {
        $villages = Village::where('name', 'LIKE', "{$keyword}%")
        ->with('district.regency')
        
        ->get();

        return response()->json(ApiResponse::success($villages));
    }
}
