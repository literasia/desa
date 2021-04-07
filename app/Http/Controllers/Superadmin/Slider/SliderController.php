<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\{KabupatenKota, Sekolah, Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function index(Request $request){
    	return view('superadmin.slider.slider');
    }
}
