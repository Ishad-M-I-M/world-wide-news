<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StorearticleRequest;
use App\Http\Requests\UpdatearticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Article::all());
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
     * @param  \App\Http\Requests\StorearticleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorearticleRequest $request)
    {
        $request->validate([
            'headline'  => 'required',
            'report' => 'required',
            'category' => 'required',
            'image' => 'required|image|max:64'
        ]);

        $data = new Article();

        $file= $request->file('image');
        $data['image']= file_get_contents($file);
        $data['headline'] = $request->input('headline');
        $data['report'] = $request->input('report');
        $data['category'] = $request->input('category');
        $data['reporter_id'] = $request->user()->id;
        $data->save();
        return redirect()->route('article.create')->with('success', 'Article is submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatearticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatearticleRequest $request, Article $article)
    {
        $request->validate([
            'headline'  => 'required',
            'report' => 'required',
            'category' => 'required',
            'image' => 'required|image|max:64'
        ]);


        $file= $request->file('image');
//        $image = Image::make($file);

        DB::table('articles')->where(['id'=> $request->input('id')])->update([
            'headline'=> $request->input('headline'),
            'report' => $request->input('report'),
            'category' => $request->input('category'),
            'image' => $image
        ]);
        return redirect()->route('article.create')->with('success', 'Article is edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function getArticleImage($id){
        $image = DB::table('articles')->where(['id'=> $id])->select('image')->first();
        if($image === null) abort(404);
        $file = Image::make($image->image);
        $file->encode('jpeg');

        $response = Response::make($file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
