<?php

namespace App\Http\Controllers\API;

use App\Models\CategoryBusiness;
use App\Http\Controllers\Controller;
use App\Utils\ApiResponse;

class CategoryBusinessAPIController
{
    public function getCategoryBusiness($village_id)
    {
        $category = CategoryBusiness::where('category_businesses.village_id', $village_id)->get('category_businesses.*');

        return response()->json(ApiResponse::success($category, 'Success get data'));
    }
}