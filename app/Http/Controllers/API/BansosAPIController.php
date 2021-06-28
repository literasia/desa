<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{SocialAssistanceFamily, Family, SocialAssistanceType};
use App\Models\SocialAssistanceIndividu;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class BansosAPIController extends Controller
{

    public function bansosFamily($village_id,Request $req) {
        $bansos = SocialAssistanceFamily::join('families', 'families.id', 'social_assistance_families.family_id')
            ->join('citizens', 'citizens.id', 'families.citizen_id')
            ->where('social_assistance_families.village_id', $village_id)
            ->get();
        return response()->json(ApiResponse::success($bansos));
    }
    
    public function bansosIndividu($village_id,Request $req) {
        $bansos = SocialAssistanceIndividu::join('citizens', 'citizens.id', 'social_assistance_individus.citizen_id')
            ->where('social_assistance_individus.village_id', $village_id)
            ->get();
        return response()->json(ApiResponse::success($bansos));
    }
}
