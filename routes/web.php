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



Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('user/list', 'UserController@list')->name('user.list');
    Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::get('user/update/{id}', 'UserController@update')->name('user.update');
    Route::post('user/update/{id}', 'UserController@updateStore')->name('user.update.store');

});

Route::post('user/store','UserController@store')->name('user.store');
Route::post('user/login','UserController@login')->name('user.login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste',function(){
    return view('teste');
});

Auth::routes();



