<?php

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
// TODO: load from database
$articles = [['id'=> 1, 'headline'=> 'Article Headline 1', 'report' => 'this is a test article for make sure view is rendering as expected. Some extra sentences to get the text to be wrapped up in article card in welcome screen'],
    ['id'=> 2, 'headline'=> 'Article Headline 2', 'report' => 'this is a test article for make sure view is rendering as expected.'],
    ['id'=> 3, 'headline'=> 'Article Headline 3', 'report' => 'this is a test article for make sure view is rendering as expected.'],
    ['id'=> 4, 'headline'=> 'Article Headline 4', 'report' => 'this is a test article for make sure view is rendering as expected.']];

Route::get('/', function () use ($articles) {
    return view('welcome',['articles'=> $articles, 'role' => \Illuminate\Support\Facades\Auth::user()->role??'guest']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'reporter'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/article/{id}', function ($id) use ($articles) {
    $index = array_search($id, array_column($articles, 'id'));
    if ($index === false){
        abort(404);
    }
    return view('article',$articles[$index]);
});

Route::view('/write-article','write-article')->middleware(['auth','reporter']);
Route::post('/article', function (\Illuminate\Http\Request $request){
    //TODO: store article to database
    return \Illuminate\Support\Facades\Redirect::to('/')->with('success', 'Article is submitted to approval');
})->name('article.create');

Route::view('/admin-panel','admin-panel');