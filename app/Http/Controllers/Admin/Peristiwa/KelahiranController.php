<?php

namespace App\Http\Controllers\Admin\Peristiwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function index() {
        return view('admin.peristiwa.kelahiran');
    }
}
