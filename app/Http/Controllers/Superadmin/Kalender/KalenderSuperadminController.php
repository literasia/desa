<?php

namespace App\Http\Controllers\Superadmin\Kalender;

use App\Models\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class KalenderSuperadminController extends Controller
{
    public function index(Request $request)
    {

        return view('superadmin.kalender.kalender');
    }
}
