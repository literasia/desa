<?php

namespace App\Http\Controllers\Admin\Referensi;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Employee;
use App\Models\Admin\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PengaturanHakAksesController extends Controller
{
    public function index() {
    	$employees = Employee::where(['village_id'=>auth()->user()->village_id])->get();

    	// dd($pegawais[0]->access);
        return view('admin.referensi.pengaturan-hak-akses', [
        	'employees'	=> $employees
        ]);
    }

    public function update(Request $request)
    {
    	$pegawai_id    = $request->pegawai_id;
    	$isChecked     = $request->isChecked;
    	$structure     = $request->structure;

    	$access = Access::where('employee_id', $pegawai_id)->first();
    	$access->{$structure} = $isChecked=='true'?1:0;
    	// dd($access);
    	$access->save();
    }
}
