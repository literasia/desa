<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Employee, Citizen, Family, Potency};

class AdminController extends Controller
{
    public function index() {
        
        $employee = Employee::where('village_id', auth()->user()->village->id)->count();
        $citizen = Citizen::where('village_id', auth()->user()->village->id)->count();
        $family = Family::where('village_id', auth()->user()->village->id)->count();
        $potency = Potency::where('village_id', auth()->user()->village->id)->count();

        return view('admin.index', compact(
            'employee',
            'citizen',
            'family',
            'potency'
        ));
    }
}
