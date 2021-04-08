<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class NewsAPIController extends Controller
{

    public function index($village_id,Request $req) {
        $data = $req->all();

        $berita = News::query();

        $q = $req->query('q');
        $berita->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%" . strtolower($q) . "%'");
        });

        $berita = $berita->where('village_id', $village_id)->orderBy('create_date', 'desc')->limit(30)->get();
        return response()->json(ApiResponse::success($berita));
    }
}
