<?php

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
use App\Vacancy;

Route::get('/', function () {
    Vacancy::createIndex($shards = null, $replicas = null);
    Vacancy::putMapping($ignoreConflicts = true);
    Vacancy::addAllToIndex();

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
