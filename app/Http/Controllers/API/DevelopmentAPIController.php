<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;
use App\Models\Development;
use Validator;

class DevelopmentAPIController extends Controller
{
    public function getDevelopment($village_id)
    {
        $dev = Development::select('developments.id','development_name','description','types_name')->join('development_types', 'developments.development_types_id', 'development_types.id')
        ->where('developments.village_id', $village_id)->get();

        return response()->json(ApiResponse::success($dev, 'Success get data'));
    }
}
