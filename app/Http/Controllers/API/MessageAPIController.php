<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Message;
use App\Utils\ApiResponse;

class MessageAPIController extends Controller
{
    public function getMessage($village_id)
    {
        $pesan = Message::where('village_id', $village_id)->orderByDesc('created_at')->get('messages.*');

        return response()->json(ApiResponse::success($pesan, 'Success get data'));
    }
}
