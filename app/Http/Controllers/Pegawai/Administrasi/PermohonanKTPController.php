<?php

namespace App\Http\Controllers\Pegawai\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Ktp;
use App\Models\Employee;

class PermohonanKTPController extends Controller
{
    public function index(Request $request) {
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        if ($request->ajax()) {
            $data = Ktp::latest()->get();
            return DataTables::of($data)
                ->addColumn('status', function($data){

                    switch ($data->status) {
                        case 'processing':
                            return '<lable class="label label-warning">'. $data->status .'</label>';
                            break;
                        case 'success':
                            return '<lable class="label label-warning">'. $data->status .'</label>';
                            break;
                        case 'rejected':
                            return '<lable class="label label-danger">'. $data->status .'</label>';
                            break;
                        default:
                            # code...
                            break;
                    }
                })
                ->rawColumns(['status'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pegawai.administrasi.permohonan-pembuatan-ktp', ["employee"=>$employee]);
    }
}
