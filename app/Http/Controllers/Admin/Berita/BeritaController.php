<?php

namespace App\Http\Controllers\Admin\Berita;


use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Utils\CRUDResponse;



class BeritaController extends Controller
{
    public function index(Request $request){
        return view('admin.berita.berita');
    }
}
