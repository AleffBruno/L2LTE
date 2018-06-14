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

//must be logged/authenticated
Route::group(['middleware'=>RouteVariables::auth],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //user
    Route::group(['prefix'=>RouteVariables::user,'as'=>RouteVariables::user.'.'],function(){

        Route::get('list', 'UserController@list')->name('list');

        Route::group(['middleware'=>'can:actionsThatRequireUserId,id'],function(){

            Route::delete('delete/{id}', 'UserController@delete')->name('delete');
            Route::get('update/{id}', 'UserController@update')->name('update');
            Route::put('update/{id}', 'UserController@updateStore')->name('update.store');

        });
        
    });

    //account
    Route::group(['prefix'=>RouteVariables::account,'as'=>RouteVariables::account.'.'],function(){

        Route::group(['middleware'=>'can:actionsThatRequireUserId,id'],function(){

            Route::get('create/{id}','AccountController@createAccount')->name('create');
            Route::post('store/{id}','AccountController@store')->name('store');
            Route::get('list/{id}','AccountController@accountList')->name('list');

        });

        Route::group(['middleware'=>'can:actionsThatRequireAccountLogin,login'],function(){

            Route::delete('delete/{login}','AccountController@delete')->name('delete');
            Route::get('update/{login}','AccountController@update')->name('update');
            Route::put('update/{login}','AccountController@updateStore')->name('update.store');
            
        });
       
    });

});

//free routes

//user
Route::group(['prefix'=>RouteVariables::user,'as'=>RouteVariables::user.'.'],function(){
    Route::post('store','UserController@store')->name('store');
    Route::post('login','UserController@login')->name('login');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste',function(){
    return view('teste');
});

Auth::routes();




