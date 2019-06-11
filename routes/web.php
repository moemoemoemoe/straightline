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
Route::get('front_index',['as'=> 'front_index','uses'=>'FrontController@front_index']);
Route::get('package_detail/{id}',['as'=> 'package_detail','uses'=>'FrontController@package_detail']);
Route::get('all_packages',['as'=> 'all_packages','uses'=>'FrontController@all_packages']);
Route::get('services',['as'=> 'services','uses'=>'FrontController@services']);
Route::get('contactus',['as'=> 'contactus','uses'=>'FrontController@contactus']);
Route::get('aboutus',['as'=> 'aboutus','uses'=>'FrontController@aboutus']);
Route::get('loyality_program',['as'=> 'loyality_program','uses'=>'FrontController@loyality_program']);

Route::post('front_index',['as'=> 'front_index','uses'=>'FrontController@front_index_search']);
Route::get('result_search',['as'=> 'result_search','uses'=>'FrontController@result_search']);

Route::get('autocomplete',['as'=> 'autocomplete','uses'=>'FrontController@autocomplete']);
/////front end forms frontsubmitcontroller
Route::post('submit_insurance',['as'=> 'submit_insurance','uses'=>'FrontSubmitController@submit_insurance']);
Route::post('submit_callback',['as'=> 'submit_callback','uses'=>'FrontSubmitController@submit_callback']);
Route::post('submit_mailinglist',['as'=> 'submit_mailinglist','uses'=>'FrontSubmitController@submit_mailinglist']);
Route::post('submit_reservation_pack/{id}',['as'=> 'submit_reservation_pack','uses'=>'FrontSubmitController@submit_reservation_pack']);
Route::post('submit_contactus',['as'=> 'submit_contactus','uses'=>'FrontSubmitController@submit_contactus']);

//////////////////Load more
Route::post('load_data',['as'=> 'load_data','uses'=>'LoadMoreController@load_data']);
Route::post('search_in_all_package',['as'=> 'search_in_all_package','uses'=>'FrontController@search_in_all_package']);
Route::get('packages_results',['as'=> 'packages_results','uses'=>'FrontController@packages_results']);

//////////////////

  Route::get('dashboard/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
  Route::post('dashboard/login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
 Route::post('dashboard/logout', ['as' => 'logout', 'uses' =>'Auth\LoginController@logout']);
Route::get('dashboard/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('dashboard/register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function() {

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
  Route::post('show_hotels',['as'=> 'show_hotels','uses'=>'PackageController@show_hotels']);

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


////////////////////////popularController

  Route::get('create_popular',['as'=> 'create_popular','uses'=>'PopularController@create_popular']);
  Route::post('create_popular',['as'=> 'create_popular','uses'=>'PopularController@create_popular_save']);
  Route::get('publish_popular/{id}', ['as' => 'publish_popular', 'uses' => 'PopularController@publish_popular']);
  Route::get('update_popular/{id}', ['as' => 'update_popular', 'uses' => 'PopularController@update_popular']);
  Route::post('update_popular/{id}', ['as' => 'update_popular', 'uses' => 'PopularController@update_popular_save']);

///////////////////Service Controller

  Route::get('create_service',['as'=> 'create_service','uses'=>'ServiceController@create_service']);
  Route::post('create_service',['as'=> 'create_service','uses'=>'ServiceController@create_service_save']);
  Route::get('publish_service/{id}', ['as' => 'publish_service', 'uses' => 'ServiceController@publish_service']);
  Route::get('update_service/{id}', ['as' => 'update_service', 'uses' => 'ServiceController@update_service']);
  Route::post('update_service/{id}', ['as' => 'update_service', 'uses' => 'ServiceController@update_service_save']);
  Route::get('change_section/{id}', ['as' => 'change_section', 'uses' => 'ServiceController@change_section']);

///////////////Contact Controller
  Route::get('contact_index',['as'=> 'contact_index','uses'=>'ContactController@contact_index']);
  Route::post('contact_index',['as'=> 'contact_index','uses'=>'ContactController@contact_index_save']);

////////////////////////HomeController
  Route::get('search_index',['as'=> 'search_index','uses'=>'HomeController@search_index']);
  Route::post('search_index',['as'=> 'search_index','uses'=>'HomeController@search_index_result']);
/////////insurance Controller

  Route::get('insurance_index',['as'=> 'insurance_index','uses'=>'insuranceController@insurance_index']);
  Route::get('delete_insurance/{id}',['as'=> 'delete_insurance','uses'=>'insuranceController@delete_insurance']);
  Route::get('archive_insurance/{id}', ['as' => 'archive_insurance', 'uses' => 'insuranceController@archive_insurance']);

//////Call Back Controlller

  Route::get('callback_index',['as'=> 'callback_index','uses'=>'CallbackController@callback_index']);
  Route::get('delete_callback/{id}',['as'=> 'delete_callback','uses'=>'CallbackController@delete_callback']);
  Route::get('archive_callback/{id}', ['as' => 'archive_callback', 'uses' => 'CallbackController@archive_callback']);

/////////////////mailing controller

  Route::get('mailing_index',['as'=> 'mailing_index','uses'=>'MailingController@mailing_index']);
  Route::get('delete_mailing/{id}',['as'=> 'delete_mailing','uses'=>'MailingController@delete_mailing']);
  Route::get('archive_mailing/{id}', ['as' => 'archive_mailing', 'uses' => 'MailingController@archive_mailing']);

  ////contact us message controller 

  Route::get('contactmessage_index',['as'=> 'contactmessage_index','uses'=>'ContactMessageController@contactmessage_index']);
  Route::get('delete_contactmessage/{id}',['as'=> 'delete_contactmessage','uses'=>'ContactMessageController@delete_contactmessage']);
  Route::get('archive_contactmessage/{id}', ['as' => 'archive_contactmessage', 'uses' => 'ContactMessageController@archive_contactmessage']);

  //////////////Reservation Controller 

  Route::get('reservation_package',['as'=> 'reservation_package','uses'=>'ReservationPackageController@reservation_package_index']);
  Route::get('delete_reservation_package/{id}',['as'=> 'delete_reservation_package','uses'=>'ReservationPackageController@delete_reservation_package']);
  Route::get('archive_reservation_package/{id}', ['as' => 'archive_reservation_package', 'uses' => 'ReservationPackageController@archive_reservation_package']);
  Route::get('view_reservation_package/{id}', ['as' => 'view_reservation_package', 'uses' => 'ReservationPackageController@view_reservation_package']);
  Route::post('reservation_package',['as'=> 'reservation_package','uses'=>'ReservationPackageController@reservation_package_search']);
  
  /////////////////////Excell Controller

  Route::get('export_mailing_excell/{type}',['as'=> 'export_mailing_excell','uses'=>'ExcellController@export_mailing_excell']);
  Route::get('export_insurance_excell/{type}',['as'=> 'export_insurance_excell','uses'=>'ExcellController@export_insurance_excell']);
  Route::get('export_callback_excell/{type}',['as'=> 'export_callback_excell','uses'=>'ExcellController@export_callback_excell']);
  Route::get('export_packres_excell/{type}',['as'=> 'export_packres_excell','uses'=>'ExcellController@export_packres_excell']);
  Route::get('export_contact_excell/{type}',['as'=> 'export_contact_excell','uses'=>'ExcellController@export_contact_excell']);
////////////////////////Profile Loyality Controller 


  Route::get('profile_index',['as'=> 'profile_index','uses'=>'ProfileController@profile_index']);
  Route::post('profile_index',['as'=> 'profile_index','uses'=>'ProfileController@profile_index_update']);
  Route::get('loyality_index',['as'=> 'loyality_index','uses'=>'LoyalityController@loyality_index']);
  Route::post('loyality_index',['as'=> 'loyality_index','uses'=>'LoyalityController@loyality_index_save']);
  Route::get('loyality_archive/{id}', ['as' => 'loyality_archive', 'uses' => 'LoyalityController@loyality_archive']);
  Route::get('loyality_messages',['as'=> 'loyality_messages','uses'=>'LoyalityController@loyality_messages']);


////////////////////faqterm controller

  Route::get('faq_index',['as'=> 'faq_index','uses'=>'FaqTermsController@faq_index']);
  Route::post('faq_index',['as'=> 'faq_index','uses'=>'FaqTermsController@faq_index_save']);
  Route::get('faq_archive/{id}', ['as' => 'faq_archive', 'uses' => 'FaqTermsController@faq_archive']);
  Route::get('terms_index',['as'=> 'terms_index','uses'=>'FaqTermsController@terms_index']);
  Route::post('terms_index',['as'=> 'terms_index','uses'=>'FaqTermsController@terms_index_save']);

});
