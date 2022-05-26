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
$articles = [['id'=> 1, 'headline'=> 'Article Headline 1', 'report' => 'this is a test article for make sure view is rendering as expected.'],
    ['id'=> 2, 'headline'=> 'Article Headline 2', 'report' => 'this is a test article for make sure view is rendering as expected.'],
    ['id'=> 3, 'headline'=> 'Article Headline 3', 'report' => 'this is a test article for make sure view is rendering as expected.'],
    ['id'=> 4, 'headline'=> 'Article Headline 4', 'report' => 'this is a test article for make sure view is rendering as expected.']];

Route::get('/', function () use ($articles) {
    return view('welcome',['articles'=> $articles]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'reporter'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/article/{id}', function ($id) use ($articles) {
    $article = $articles[array_search($id, array_column($articles, 'id'))];
    return view('article',$article);
});

Route::view('/write-article','write-article');
