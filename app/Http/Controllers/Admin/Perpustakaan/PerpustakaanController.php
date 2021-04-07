<?php

namespace App\Http\Controllers\Admin\Perpustakaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index() {
        return view('admin.perpustakaan.perpustakaan');
    }
}
