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

Route::resource('/uploads', 'UploadController');

Route::post('uploads/store', ['as'=>'uploads.store','uses'=>'UploadController@upload']);
Route::delete('/uploads/destroy','UploadController@destroy')->name('uploads.destroy');