<?php

namespace App\Http\Controllers\Superadmin\ListDesa;

use App\Role;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ListDesaController extends Controller
{
    public function index(Request $request) {
        return view('superadmin.list-desa.list-desa');
    }
}
