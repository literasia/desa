<?php

namespace App\Http\Controllers\Pegawai\Berita;

use Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\News;
use App\Models\Admin\NewsCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;

class NewsController extends Controller
{
    private $rules = [
        'title' => ['required'],
        'category' => ['required'],
        'content' => ['required'],
        'create_date' => ['required'],
        'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:3000']
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = News::where('village_id', auth()->user()->village->id)->get();
        $employee = Employee::where("user_id",auth()->user()->id)->first();
        if ($request->ajax()) {
            $data = News::where('village_id', auth()->user()->village->id)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('image', function ($data) {
                    $btnlink = '<a target="_blank" href="'.Storage::url($data->image).'" class="badge badge-warning">Lihat Foto</a>';
                    return $btnlink;
                })
                ->rawColumns(['image', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $category = NewsCategory::where('village_id', auth()->user()->village->id)->get();
        return view('pegawai.berita.berita', ['category' => $category, "employee"=>$employee]);
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
    public function store(Request $req)
    {
        $data = $req->all();
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        $data['image'] = null;
        if ($req->file('image')) {
            $data['image'] = $req->file('image')->store('berita', 'public');
        }

        News::create([
            'village_id' => auth()->user()->village->id,
            'name' => $data['title'],
            'category' => $data['category'],
            'create_date' => $data['create_date'],
            'content' => $data['content'],
            'image' => $data['image']
        ]);

        return response()
            ->json([
                'success' => 'Data berhasil ditambahkan.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = News::find($id);
        return response()
            ->json([
                'id'            => $data->id,
                'name'          => $data->name,
                'category'      => $data->category,
                'content'       => $data->content,
                'image'         => $data->image,
                'create_date'   => $data->create_date,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req) {
        $data = $req->all();

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all())->withInput();
        }

        $berita = News::findOrFail($data['hidden_id']);
        $data['image'] = null;
        if ($req->file('image')) {
            $data['image'] = $req->file('image')->store('berita', 'public');
        }

        News::whereId($data['hidden_id'])->update([
            'village_id' => auth()->user()->village->id,
            'name' => $data['title'],
            'category' => $data['category'],
            'create_date' => $data['create_date'],
            'content' => $data['content'],
            'image' => $data['image'] ?? $berita->image
        ]);

        if ($req->file('image') && $berita->image && Storage::disk('public')->exists($berita->image)) {
            Storage::disk('public')->delete($berita->image);
        }

        return response()
            ->json([
                'success' => 'Data berhasil di update.',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = News::find($id);
        $berita->delete();
        if ($berita->image && Storage::disk('public')->exists($berita->image)) {
            Storage::disk('public')->delete($berita->image);
        }
    }
}
