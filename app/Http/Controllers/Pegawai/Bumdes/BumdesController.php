<?php

namespace App\Http\Controllers\Pegawai\Bumdes;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\{Bumdes,Citizen, Employee};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class BumdesController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = auth()->user()->employee[0]->name;
        $citizen = Employee::where('village_id', auth()->user()->village->id)->get();
        if ($request->ajax()) {
            $data = Bumdes::where('employee_id', auth()->user()->employee[0]->id)->where('village_id',auth()->user()->village->id)->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->editColumn('employee_id', function($data) {
                    return $data->employee->name;
                })
                ->editColumn('bumdes_image', function ($data) {
                    $btnlink = '<a href="'. Storage::url($data->bumdes_image).'" class="text-success"><i class="fa fa-check-circle mr-2"></i>Lihat Foto</a>';
                    return $btnlink;
                })
                ->editColumn('financial_report', function ($data) {
                    $btnlink = '<a href="'. Storage::url($data->financial_report).'" class="text-warning"><i class="fa fa-check-circle mr-2"></i>Download File</a>';
                    return $btnlink;
                })
                ->rawColumns(['action','bumdes_image','financial_report'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pegawai.bumdes.bumdes', compact('citizen','name'));
    }

  
    public function store(Request $request)
    {
        $data = $request->all();
       // validasi
        $rules = [
            'bumdes_name'  => 'required|max:100',
            'description' => 'required',
            'citizen' => 'required',
            'no_whatsapp' => 'required|max:13|min:11',
            'bumdes_address' => 'required',
            'since_year' => 'required',
            'number_of_employee' => 'required',
            'adrt' => 'required',
            'financial_report' => 'required|mimes:pdf,xlx,csv,docx|max:2048',
            'earnings_last_year' => 'required',
            'profits_last_year' => 'required',
            'bumdes_image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }
        
        $data['financial_report'] = null;
        if ($request->file('financial_report')) {
            $data['financial_report'] = $request->file('financial_report')->store('bumdes', 'public');
        }


        $data['bumdes_image'] = null;
        if ($request->file('bumdes_image')) {
            $data['bumdes_image'] = $request->file('bumdes_image')->store('bumdes', 'public');
        }

        Bumdes::create([
            'bumdes_name'  => $request->bumdes_name,
            'description' => $request->description,
            'employee_id' => auth()->user()->employee[0]->id,
            'registration_code' => $request->registration_code,
            'status' => $request->status,
            'no_whatsapp' => $request->no_whatsapp,
            'bumbdes_email' => $request->bumdes_email,
            'bumdes_address' => $request->bumdes_address,
            'since_year' => $request->since_year,
            'number_of_employee' => $request->number_of_employee,
            'adrt' => $request->adrt,
            'financial_report' => $data['financial_report'],
            'earnings_last_year' => $request->earnings_last_year,
            'profits_last_year' => $request->profits_last_year,
            'bumdes_image' => $data['bumdes_image'],
            'village_id' => auth()->user()->village->id
        ]);
       

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }


    public function edit($id) 
    {        
        //
        $data = Bumdes::with('employee')->find($id);
        
        return response()
            ->json([
                $data,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bumdes  $bumdes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) 
    {        
        //
        $data = $request->all();
        // validasi
         $rules = [
             'bumdes_name'  => 'required|max:100',
             'description' => 'required',
             'citizen' => 'required',
             'no_whatsapp' => 'required|max:13',
             'bumdes_address' => 'required',
             'since_year' => 'required',
             'number_of_employee' => 'required',
             'adrt' => 'required',
             'financial_report' => 'nullable|mimes:pdf,xlx,csv,docx|max:2048',
             'earnings_last_year' => 'required',
             'profits_last_year' => 'required',
             'bumdes_image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000']
         ];
 
         $validator = Validator::make($request->all(), $rules);
 
         if ($validator->fails()) {
             return response()
                 ->json([
                     'errors' => $validator->errors()->all()
                 ]);
         }

         $file = Bumdes::findOrFail($request->hidden_id);
         
         $data['financial_report'] = null;
         if ($request->file('financial_report')) {
             $data['financial_report'] = $request->file('financial_report')->store('bumdes', 'public');
         }
 
 
         $data['bumdes_image'] = null;
         if ($request->file('bumdes_image')) {
             $data['bumdes_image'] = $request->file('bumdes_image')->store('bumdes', 'public');
         }
 
         Bumdes::where('id', $request->hidden_id)->update([
             'bumdes_name'  => $request->bumdes_name,
             'description' => $request->description,
             'registration_code' => $request->registration_code,
             'status' => $request->status,
             'no_whatsapp' => $request->no_whatsapp,
             'bumbdes_email' => $request->bumdes_email,
             'bumdes_address' => $request->bumdes_address,
             'since_year' => $request->since_year,
             'number_of_employee' => $request->number_of_employee,
             'adrt' => $request->adrt,
             'financial_report' => $data['financial_report'] ?? $file->financial_report,
             'earnings_last_year' => $request->earnings_last_year,
             'profits_last_year' => $request->profits_last_year,
             'bumdes_image' => $data['bumdes_image'] ?? $file->bumdes_image,
             'village_id' => auth()->user()->village->id
         ]);
         
         if ($request->file('bumdes_image') && $file->bumdes_image && Storage::disk('public')->exists($file->bumdes_image)) {
            Storage::disk('public')->delete($file->bumdes_image);
        }

        if ($request->file('financial_report') && $file->financial_report && Storage::disk('public')->exists($file->financial_report)) {
            Storage::disk('public')->delete($file->financial_report);
        }

 
         return response()
             ->json([
                 'success' => 'Data Added.',
             ]);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bumdes  $bumdes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        //
        $bumdes = Bumdes::find($id);
        $bumdes->delete();
        if ($bumdes->bumdes_image && Storage::disk('public')->exists($bumdes->bumdes_image)) {
            Storage::disk('public')->delete($bumdes->bumdes_image);
        }
        if ($bumdes->financial_report && Storage::disk('public')->exists($bumdes->financial_report)) {
            Storage::disk('public')->delete($bumdes->financial_report);
        }
    }
}