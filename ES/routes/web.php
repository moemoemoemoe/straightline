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

Route::get('test',['as'=> 'test','uses'=>'TestController@getArticles']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('es',['as'=> 'es','uses'=>'TestController@es']);
Route::post('es',['as'=> 'es','uses'=>'TestController@es_save']);
Route::get('es_search',['as'=> 'es_search','uses'=>'TestController@show_es']);
Route::get('sql_search',['as'=> 'sql_search','uses'=>'TestController@show_my']);





