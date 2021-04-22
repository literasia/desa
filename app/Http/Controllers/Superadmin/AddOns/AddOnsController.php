<?php

namespace App\Http\Controllers\Superadmin\AddOns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddOnsController extends Controller
{
    public function index() {
        return view('superadmin.add-ons.add-ons');
    }
}
