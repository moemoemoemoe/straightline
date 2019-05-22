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
Route::group(['prefix' => '/', 'middleware' => 'auth'], function() {

Route::get('home', 'HomeController@index')->name('home');

Route::get('manage_package_categories', ['as' => 'manage_package_categories', 'uses' => 'PackageCategories@manage_package_categories']);
Route::post('manage_package_categories', ['as' => 'manage_package_categories', 'uses' => 'PackageCategories@manage_package_categories_save']);
Route::get('publish_cat/{id}', ['as' => 'publish_cat', 'uses' => 'PackageCategories@publish_cat']);
Route::get('update_cat/{id}', ['as' => 'update_cat', 'uses' => 'PackageCategories@update_cat']);
Route::post('update_cat/{id}', ['as' => 'update_cat', 'uses' => 'PackageCategories@update_cat_save']);
///////////////////////////////////theme controller

Route::get('manage_themes', ['as' => 'manage_themes', 'uses' => 'ThemeController@manage_themes']);
Route::post('manage_themes', ['as' => 'manage_themes', 'uses' => 'ThemeController@manage_themes_save']);
Route::get('publish_theme/{id}', ['as' => 'publish_theme', 'uses' => 'ThemeController@publish_theme']);
Route::get('update_theme/{id}', ['as' => 'update_theme', 'uses' => 'ThemeController@update_theme']);
Route::post('update_theme/{id}', ['as' => 'update_theme', 'uses' => 'ThemeController@update_theme_save']);

///////////////////////////////////cont controller
Route::get('manage_cont', ['as' => 'manage_cont', 'uses' => 'ContinentController@manage_cont']);
Route::post('manage_cont', ['as' => 'manage_cont', 'uses' => 'ContinentController@manage_cont_save']);
Route::get('publish_cont/{id}', ['as' => 'publish_cont', 'uses' => 'ContinentController@publish_cont']);
Route::get('update_cont/{id}', ['as' => 'update_cont', 'uses' => 'ContinentController@update_cont']);
Route::post('update_cont/{id}', ['as' => 'update_cont', 'uses' => 'ContinentController@update_cont_save']);

////////////////////////////packagecontroller

Route::get('create_package', ['as' => 'create_package', 'uses' => 'PackageController@create_package']);
Route::post('create_package', ['as' => 'create_package', 'uses' => 'PackageController@create_package_save']);
Route::get('view_packages', ['as' => 'view_packages', 'uses' => 'PackageController@view_packages']);
Route::get('package_update/{id}', ['as' => 'package_update', 'uses' => 'PackageController@package_update']);
Route::post('package_update/{id}', ['as' => 'package_update', 'uses' => 'PackageController@package_update_save']);


Route::get('delete_gallery/{id}',['as'=> 'delete_gallery','uses'=>'PackageController@delete_gallery']);





/////////////////country cities controller


Route::get('manage_country',['as'=> 'manage_country', 'uses'=>'CountryCityController@manage_country']);
Route::post('manage_country',['as'=> 'manage_country', 'uses'=>'CountryCityController@manage_country_save']);
Route::get('update_country/{id}',['as'=> 'update_country', 'uses'=>'CountryCityController@update_country']);
Route::post('update_country/{id}',['as'=> 'update_country', 'uses'=>'CountryCityController@update_country_save']);

Route::get('manage_city',['as'=> 'manage_city', 'uses'=>'CountryCityController@manage_city']);
Route::post('manage_city',['as'=> 'manage_city', 'uses'=>'CountryCityController@manage_city_save']);
Route::get('update_city/{id}',['as'=> 'update_city', 'uses'=>'CountryCityController@update_city']);
Route::post('update_city/{id}',['as'=> 'update_city', 'uses'=>'CountryCityController@update_city_save']);

//////////////////////hotelController

Route::get('manage_hotel',['as'=> 'manage_hotel','uses'=>'HotelController@manage_hotel']);
Route::post('manage_hotel',['as'=> 'manage_hotel','uses'=>'HotelController@manage_hotel_save']);
Route::get('hotel_update/{id}',['as'=> 'hotel_update','uses'=>'HotelController@hotel_update']);
Route::post('hotel_update/{id}',['as'=> 'hotel_update','uses'=>'HotelController@hotel_update_save']);








});