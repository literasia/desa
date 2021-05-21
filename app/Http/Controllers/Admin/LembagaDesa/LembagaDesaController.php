<?php

namespace App\Http\Controllers\Admin\LembagaDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\User;
use Illuminate\Support\Facades\Auth;


class LembagaDesaController extends Controller
{

    public function index(Request $request) {

        return view('admin.lembagadesa.lembagadesa');

    }
}