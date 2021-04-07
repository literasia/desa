<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function index(Request $request){
    	return view('admin.slider.slider');
    }
}
