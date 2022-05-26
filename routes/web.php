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

Route::get('/', function () {
    // TODO: load from database
    $articles = [['headline'=> 'Article Headline 1', 'report' => 'this is a test article for make sure view is rendering as expected.'],
        ['headline'=> 'Article Headline 2', 'report' => 'this is a test article for make sure view is rendering as expected.'],
        ['headline'=> 'Article Headline 3', 'report' => 'this is a test article for make sure view is rendering as expected.'],
        ['headline'=> 'Article Headline 4', 'report' => 'this is a test article for make sure view is rendering as expected.']];
    return view('welcome',['articles'=> $articles ,'role' => \Illuminate\Support\Facades\Auth::user()->role??'reader']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'reporter'])->name('dashboard');

require __DIR__.'/auth.php';
