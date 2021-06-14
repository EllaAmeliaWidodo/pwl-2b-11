<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $content = Content::all(); // Mengambil semua isi tabel
        $paginate = Content::orderBy('title', 'asc')->paginate(5);
        return view('contents.index', ['contents' => $content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }

        Content::create([
            'title'             => $request->title,
            'content'           => $request->content,
            'featured_image'    => $image_name,
        ]);

        return 'Artikel berhasil disimpan';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);

        return view('contens.edit', ['content' => $content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Content::find($id);

        $content->title = $request->title;
        $content->content = $request->content;

        if($content->featured_image && file_exists(storage_path('app/public/' . $content->featured_image))){
            \Storage::delete('public/' . $content->featured_image);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $content->featured_image = $image_name;

        $content->save();
        return 'Artikel berhasil diubah';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }

    public function cetak_pdf(){
        $contents = Content::all();
        
        $pdf = PDF::loadview('contents.contents_pdf', ['contents'=>$contents]);
        return $pdf->stream();
    }
}