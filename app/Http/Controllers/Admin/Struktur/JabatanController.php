<?php

namespace App\Http\Controllers\Admin\Struktur;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function index() {
        return view('admin.struktur.jabatan');
    }
}