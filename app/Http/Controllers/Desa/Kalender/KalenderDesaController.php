<?php

namespace App\Http\Controllers\Desa\Kalender;

use App\Models\Kalender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class KalenderDesaController extends Controller
{
    public function index(Request $request)
    {

        return view('desa.kalender.kalender');
    }
}
