<?php

namespace App\Http\Controllers\Admin\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\LandCertificate;

class KeteranganTanahController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = LandCertificate::latest()->get();
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

        return view('admin.administrasi.keterangan-tanah');
    }
}
