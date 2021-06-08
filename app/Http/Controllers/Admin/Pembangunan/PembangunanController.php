<?php

namespace App\Http\Controllers\Admin\Pembangunan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PembangunanController extends Controller
{

    public function index(Request $request) {

        return view('admin.pembangunan.pembangunan');

    }
}