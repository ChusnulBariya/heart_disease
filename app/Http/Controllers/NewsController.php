<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = news::all();
        $data['message'] = true;
        $data['result'] = $news;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tittle' => 'required',
            'content' => 'required',
        ]);

        $result = News::create($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Berita baru berhasil ditambahkan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news = News::find($news);
        $data['succes'] = true;
        $data['message'] = "Detail berita acara";
        $data['result'] = $news;
        return response()->json($data, Response::HTTP_OK);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tittle' => 'required',
            'content' => 'required',
        ]);

        $result = News::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Berita baru berhasil ditambahkan";
            $data['reslut'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if($news){
            $news->delete();
            $data['success'] = true;
            $data['message'] = "Berita acara berhasi dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Tidak ada berita acara";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
