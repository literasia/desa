<?php

namespace App\Http\Controllers\Pegawai\Struktur;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\{VillageStructure, Employee, Position};

class StrukturDesaController extends Controller
{
    private $rules = [
        'employee_id' => ['required'],
        'position_id' => ['required'],
        'status' => ['required'],
        'level' => ['required'],
        'description' => ['required'],
    ];


    public function index(Request $request) {
        $data = VillageStructure::where('village_id', auth()->user()->village->id)->get();
        $employee = Employee::where("user_id",auth()->user()->id)->first();

        if ($request->ajax()) {
            $villageStructures = VillageStructure::where('village_id', auth()->user()->village->id)->get();

            return DataTables::of($villageStructures)
                ->addColumn('action', function ($villageStructures) {
                    $button = '<button type="button" id="'.$villageStructures->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$villageStructures->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->editColumn('employee_id', function($villageStructures){
                    return $villageStructures->employee->name;
                })
                ->editColumn('position_id', function($villageStructures){
                    return $villageStructures->position->name;
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('pegawai.struktur.struktur', ["employee"=>$employee]);
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        VillageStructure::create([
            'village_id' => auth()->user()->village->id,
            'position_id' => $data['position_id'],
            'employee_id' => $data['employee_id'],
            'parent_id' => $data['parent_id'],
            'level' => $data['level'],
            'status' => $data['status'],
            'description' => $data['description'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VillageStructure::find($id);
        return response()
            ->json([
                'id' => $data->id,
                'employee_id' => $data['employee_id'],
                'position_id' => $data['position_id'],
                'parent_id' => $data['parent_id'],
                'level' => $data['level'],
                'status' => $data['status'],
                'description' => $data['description'],
            ]);
    }

    public function update(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => "Data masih kosong",
                'errors' => $validator->errors()
            ]);
        }

        $employee = VillageStructure::findOrFail($data['hidden_id']);

        $employee->update([
            'village_id' => auth()->user()->village->id,
            'employee_id' => $data['employee_id'],
            'position_id' => $data['position_id'],
            'parent_id' => $data['parent_id'],
            'level' => $data['level'],
            'status' => $data['status'],
            'description' => $data['description'],
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $villageStructure = VillageStructure::findOrFail($id);
        $villageStructure->delete();
    }

    public function getEmployee(){
        $employee = Employee::where('village_id', auth()->user()->village->id)->get();

        return response()->json($employee);
    }

    public function getPosition(){
        $position = Position::where('village_id', auth()->user()->village->id)->get();

        return response()->json($position);
    }

    public function getVillageStructure(){
        $villageStructure = VillageStructure::with('position')
                                            ->with('employee')
                                            ->where('village_id', auth()->user()->village->id)
                                            ->get();

        return response()->json($villageStructure);
    }
}
