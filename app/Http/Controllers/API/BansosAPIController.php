<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SocialAssistanceFamily;
use App\Models\SocialAssistanceIndividu;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class BansosAPIController extends Controller
{

    public function bansosFamily($village_id,Request $req) {
        $data = $req->all();

        $tour = SocialAssistanceFamily::query();

        $q = $req->query('q');
        $tour->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $tour = $tour->where('village_id', $village_id)->get();
        return response()->json(ApiResponse::success($tour));
    }
    
    public function bansosIndividu($village_id,Request $req) {
        $data = $req->all();

        $tour = SocialAssistanceIndividu::query();

        $q = $req->query('q');
        $tour->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $tour = $tour->where('village_id', $village_id)->get();
        return response()->json(ApiResponse::success($tour));
    }
}
