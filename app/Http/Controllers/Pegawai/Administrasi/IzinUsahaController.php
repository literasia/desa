<?php

namespace App\Http\Controllers\Pegawai\Administrasi;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\BusinessPermits;
use App\Models\Employee;

class IzinUsahaController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = BusinessPermits::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
                ->make(true);
        }
        $employee = Employee::where("user_id",auth()->user()->id)->first();


        return view('pegawai.administrasi.izin-usaha', ["employee"=>$employee]);
    }
}
