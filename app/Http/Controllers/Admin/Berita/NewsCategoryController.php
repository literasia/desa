<?php

namespace App\Http\Controllers\Admin\Berita;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\NewsCategory;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = NewsCategory::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.berita.kategori-berita');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validasi
        $rules = [
           'news_category'  => 'required|max:100',
       ];

       $message = [
           'news_category.required' => 'Kolom ini tidak boleh kosong',
       ];

       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       $suku = NewsCategory::create([
           'village_id' => auth()->user()->village->id,
           'name'  => $request->input('news_category'),
       ]);

       return response()
           ->json([
               'success' => 'Data berhasil ditambahkan.',
           ]);
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $news_category = NewsCategory::find($id);

        return response()
            ->json([
                'news_category'  => $news_category
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        // validasi
        $rules = [
           'news_category'  => 'required|max:100',
       ];

       $message = [
           'news_category.required' => 'Kolom ini tidak boleh kosong',
       ];

       $validator = Validator::make($request->all(), $rules, $message);

       if ($validator->fails()) {
           return response()
               ->json([
                   'errors' => $validator->errors()->all()
               ]);
       }

       NewsCategory::whereId($request->input('hidden_id'))->update([
            'village_id' => auth()->user()->village->id,
            'name'  => $request->input('news_category'),
       ]);

       return response()
           ->json([
               'success' => 'Data berhasil diupdate.',
           ]);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $delKategori = NewsCategory::find($id);
        $delKategori->delete();
    }
}
