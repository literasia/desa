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
        $accessFields = new Access;
        $accessFields = $accessFields->getTableColumns();
        return view('admin.referensi.pengaturan-hak-akses', [
        	"employees"	=> $employees,
            "accessFields"=>$accessFields
        ]);
    }

    public function update(Request $request)
    {
    	$pegawai_id    = $request->pegawai_id;
    	$structure     = $request->structure;

    	$access = Access::where('employee_id', $pegawai_id)->first();
    	$access->{$structure} = $access->{$structure} == 'true'? 1 : 0;
    	// dd($access);
    	$access->save();
        return response()->json([
            "data" => $access
        ]);
    }
}
