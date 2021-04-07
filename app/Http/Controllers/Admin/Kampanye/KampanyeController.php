<?php

namespace App\Http\Controllers\Admin\Kampanye;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KampanyeController extends Controller
{
    public function index() {
        return view('admin.kampanye.kampanye');
    }
}
