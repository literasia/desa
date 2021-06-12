<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberAwarenessLaw;
use App\Utils\ApiResponse;

class MemberAwarenessLawAPIController extends Controller
{
    public function getMember($village_id)
    {
        $member = MemberAwarenessLaw::where('village_id', $village_id)->orderByDesc('created_at')->get();

        return response()->json(ApiResponse::success($member, 'Success get data'));
    }
}
