<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Employee, Citizen, Family, Potency, Village};

class AdminController extends Controller
{
    public function index() {
        
        $data = Village::select('indoregion_villages.name as desa', 'indoregion_districts.name as kecamatan', 'indoregion_regencies.name as kabupaten', 'indoregion_provinces.name as provinsi')
                    ->where('indoregion_villages.id', auth()->user()->village_id)
                    ->join('indoregion_districts', 'indoregion_villages.district_id', 'indoregion_districts.id')
                    ->join('indoregion_regencies', 'indoregion_regencies.id', 'indoregion_districts.regency_id')
                    ->join('indoregion_provinces', 'indoregion_provinces.id','indoregion_regencies.province_id')->get()[0];
        

        $employee = Employee::where('village_id', auth()->user()->village->id)->count();
        $citizen = Citizen::where('village_id', auth()->user()->village->id)->count();
        $family = Family::where('village_id', auth()->user()->village->id)->count();
        $potency = Potency::where('village_id', auth()->user()->village->id)->count();

        return view('admin.index', compact(
            'employee',
            'citizen',
            'family',
            'potency',
            'data'
        ));
    }
}
