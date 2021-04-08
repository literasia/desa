<?php

namespace App\Http\Controllers\API;

use App\Models\BusinessType;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;

class BusinessTypeAPIController
{
    public function getBusinessType($village_id)
    {
        $types = BusinessType::where('business_types.village_id', $village_id)->get('business_types.*');

        return response()->json(ApiResponse::success($types, 'Success get data'));
    }
}