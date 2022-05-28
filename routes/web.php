<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$categories = ['Politics', 'Sports', 'Entertainment', 'Business'];

Route::get('/', function () use ($categories){
    $articles = [];
    foreach (\App\Models\article::all() as $article){
        $article = $article->attributesToArray();
        if($article['status'] == "Approved")
            $articles[] = $article;
    }

    $articlesByCategories = [];
    foreach ($categories as $category){
        $articlesByCategories[$category] = array_filter($articles, function ($article) use ($category){
            return $article['category'] === $category;
        });
    }
    return view('welcome',['articlesByCategories'=> $articlesByCategories, 'role' => \Illuminate\Support\Facades\Auth::user()->role??'guest']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'reporter'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/article/{id}', function ($id) {
    $articles = [];
    foreach (\App\Models\article::all() as $article){
        $article = $article->attributesToArray();
        if($article['status'] == "Approved")
            $articles[] = $article;
    }
    $index = array_search($id, array_column($articles, 'id'));
    if ($index === false){
        abort(404);
    }
    return view('article',$articles[$index]);
});
Route::get('/article', [\App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');

Route::get('/write-article',function (\Illuminate\Http\Request $request) use ($categories){
    $articles = [];
    foreach (\App\Models\article::all() as $article){
        $article = $article->attributesToArray();
        if($article['reporter_id'] === $request->user()->id){
            $articles[] = $article;
        }
    }
    return view('write-article',['categories' => $categories, 'articles'=> $articles]);
})->middleware(['auth','reporter'])->name('article.create');

Route::post('/article', [\App\Http\Controllers\ArticleController::class, 'store'])->middleware(['auth','reporter'])->name('article.store');

Route::get('/article/edit/{id}' , function (\Illuminate\Http\Request $request,$id) use ($categories){
    $articles = [];
    foreach (\App\Models\article::all() as $article){
        $article = $article->attributesToArray();
        if($article['reporter_id'] === $request->user()->id){
            $articles[] = $article;
        }
    }
    $index = array_search($id, array_column($articles, 'id'));
    if ($index === false){
        abort(404);
    }
    return view('write-article',['categories' => $categories, 'articles'=> $articles,'article_edit'=>$articles[$index]]);
})->middleware(['auth','reporter'])->name('article.update');

Route::post('/article/edit/{id}',[\App\Http\Controllers\ArticleController::class, 'update'])->middleware(['auth','reporter']);

Route::get('/admin-panel',function (){
    $articles = [];
    foreach (\App\Models\article::all() as $article){
        $article->attributesToArray();
        $article['reporter'] = DB::table('users')->where(['id'=>$article['reporter_id']])->get('name')->first()->name;
        $articles[] = $article;
    }
    return view('admin-panel', ['articles'=> $articles]);
})->middleware(['auth', 'admin']);

Route::get('/article-admin-view/{id}', function ($id) {
    $articles = [];
    foreach (\App\Models\article::all() as $article){
        $articles[] = $article->attributesToArray();
    }
    $index = array_search($id, array_column($articles, 'id'));
    if ($index === false){
        abort(404);
    }
    return view('article-admin-view',$articles[$index]);
})->middleware(['auth', 'admin']);

Route::post('/article-admin-view/{id}/{action}', function ($id, $action){
    if(DB::table('articles')->where(['id'=> $id])->update(['status'=> $action])) {
        return redirect('admin-panel')->with('success', 'Article successfully'.$action);
    }
    else{
        return redirect('admin-panel')->with('success', 'Article update aborted');
    }
})->middleware(['auth', 'admin']);
