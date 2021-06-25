<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\SocialAssistanceFamily;
=======
use App\Models\{SocialAssistanceFamily, Family, SocialAssistanceType};
>>>>>>> origin/syafri
use App\Models\SocialAssistanceIndividu;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class BansosAPIController extends Controller
{

    public function bansosFamily($village_id,Request $req) {
<<<<<<< HEAD
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
=======
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
>>>>>>> origin/syafri
    }
}
