<?php

namespace App\Http\Controllers\Admin\Kalender;

use App\Models\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class KalenderDesaController extends Controller
{
    public function index(){
        return view('admin.kalender.kalender');
    }
}
