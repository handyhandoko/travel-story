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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('story', 'StoryController@store')->middleware('auth');
Route::put('story/{id}', 'StoryController@update')->middleware('auth');
Route::delete('story/{id}', 'StoryController@destroy')->middleware('auth');