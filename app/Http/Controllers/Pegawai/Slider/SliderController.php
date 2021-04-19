<?php

namespace App\Http\Controllers\Pegawai\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Models\Employee;
use App\Models\Slider;
use Validator;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

	private $rules = [
        'title' => ['required'],
        'start_date' => ['required'],
        'end_date' => ['required'],
        'description' => ['required'],
        'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000']
    ];

    public function index(Request $request)
    {
    	$data = Slider::latest()->get();
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        if ($request->ajax()) {
            $data = Slider::latest()->get();
            // dd($data);
            // return "oke";
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('image', function ($data) {
                    $image = '<img width="100px" src="/storage/'.$data->image.'">';
                    return $image;
                })
                ->rawColumns(['action', 'image'])
                ->addIndexColumn()
                ->make(true);
        }
        $sliders = Slider::where('village_id', auth()->user()->village_id)->get();
    	return view('pegawai.slider.slider', compact('sliders', "employee"));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'title'=>'required',
    		'start_date'=>'required',
    		'end_date'=>'required',
    		'image'=>'required',
    	]);

    	$fileExtension = $request->image->getClientOriginalExtension();
        $fileName = Str::slug($request->title . "-" . date("Y-m-d-H-i-s"), '-') . "." . $fileExtension;
        $request->image->storeAs('public/slider', $fileName);
        $slider = Slider::create([
        	'village_id'		=> auth()->user()->village_id,
            'title'             => $request->title,
            'description'       => $request->description,
            'start_date'        => date("Y-m-d", strtotime($request->start_date)),
            'end_date'          => date("Y-m-d", strtotime($request->end_date)),
            'image'              => "slider/" . $fileName
        ]);

        // return response()->json(\App\Utils\ApiResponse::success(""));

    	return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    public function edit($id)
    {
    	return Slider::findOrFail($id);
    }

    public function update(Request $request)
    {
    	$id = $request->hidden_id;
    	$data = $request->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }


        $slider = Slider::findOrFail($id);
        $data['image'] = null;
        if ($request->file('image')) {
        	$fileExtension = $request->image->getClientOriginalExtension();
        	$fileName = Str::slug($request->title . "-" . date("Y-m-d-H-i-s"), '-') . "." . $fileExtension;
            $request->image->storeAs('public/slider', $fileName);
            $data['image'] = 'slider/'.$fileName;
        }

        Slider::whereId($id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'image' => $data['image'] ?? $slider->image
        ]);

        if ($request->file('image') && $slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        // return redirect()->route('admin.slider.slider')->with(CRUDResponse::successUpdate("Slider"));
        return response()
            ->json([
                'success' => 'Data berhasil diedit.',
        ]);
    }

    public function destroy($id)
    {
    	$slider = Slider::find($id);
        $slider->delete();
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }
    }
}
