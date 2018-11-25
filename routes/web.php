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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('story/{id}', 'StoryController@show');
Route::post('story', 'StoryController@store')->middleware('auth');
Route::put('story/{id}', 'StoryController@update')->middleware('auth');
Route::delete('story/{id}', 'StoryController@destroy')->middleware('auth');

Route::get('/images-upload', 'StoryImagesController@create');
Route::post('/images-save', 'StoryImagesController@store');
Route::post('/images-delete', 'StoryImagesController@destroy');
Route::get('/images-show', 'StoryImagesController@index');
Route::post('/sharecost-images-save', 'StoryImagesController@storeShareCost');
Route::post('/sharecost-images-delete', 'StoryImagesController@destroyShareCost');

Route::get('/trijek', function(){
    return view('pages/trijek');
});

Route::resource('sharecost', 'ShareCostController');