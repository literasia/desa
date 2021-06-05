<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\CommunityType;
use App\Utils\ApiResponse;

class CommunityAPIController extends Controller
{
    public function getCommunity($village_id)
    {
        $community = Community::join('community_types', 'communities.community_type_id', 'community_types.id')
                                ->where('communities.village_id', $village_id)->orderByDesc('community_types.created_at')->get();

        return response()->json(ApiResponse::success($community, 'Success get data'));
    }

    public function getCommunityFilter($village_id, $types_id)
    {
        $community = Community::join('community_types', 'communities.community_type_id', 'community_types.id')
                                ->join('citizens', 'citizens.user_id', 'communities.user_id')
                                ->where('communities.community_type_id', $types_id)
                                ->where('communities.village_id', $village_id)->orderByDesc('community_types.created_at')->get();

        return response()->json(ApiResponse::success($community, 'Success get data'));
    }
}
