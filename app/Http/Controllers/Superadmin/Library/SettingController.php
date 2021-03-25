<?php

namespace App\Http\Controllers\Superadmin\Library;

use Validator;
use Illuminate\Http\Request;
use App\Models\Superadmin\Tipe;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index() {
        return view('superadmin.library.setting');
    }
}
