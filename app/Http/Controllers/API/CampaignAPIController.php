<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class CampaignAPIController extends Controller
{

    public function getCampaign($village_id,Request $req) {
        $data = $req->all();

        $skck = Campaign::query();

        $q = $req->query('q');
        $skck->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $skck = $skck->where('village_id', $village_id)->get();
        return response()->json(ApiResponse::success($skck));
    }
}
