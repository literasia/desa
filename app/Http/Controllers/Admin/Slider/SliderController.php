<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(Request $request)
    {
    	return view('admin.slider.slider');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'title'=>'required',
    		'start_date'=>'required',
    		'end_date'=>'required',
    		'image'=>'required',
    	]);

    	$slider = new Slider;
    	$slider->title = $request->title;
    	$slider->start_date = $request->start_date;
    	$slider->end_date = $request->end_date;
    	$slider->description = $request->description;
    	$slider->save();
    	
    	return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
