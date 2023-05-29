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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', 'HomeController@index')->name("home");
//Route::get('/', 'PublicController@index')->name("index");
Route::get('/wizard', 'PublicController@wizard')->name("wizard");
Auth::routes();

//Route::get('/home', 'UserController@index')->name('home');



Route::group(['middleware' => 'auth', 'as' => 'voyager-frontend.account'], function () {
    Route::get('/account', "UserController@index");
});

Route::get('/donate-blood', 'UserController@donateBlood')->name('donateBlood');
Route::post('/donate-blood/{user}', 'UserController@donateBloodUpdate')->name('donateBloodUpdate');

Route::post('users/{user}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);

//Route::get('/blood-request', 'BloodRequestController@index')->name('bloodRequest');
Route::post('/blood-request', 'BloodRequestController@update');

Route::post('/current-needs', 'BloodRequestController@currentNeeds')->name('currentNeeds');

//Route::get('/donation-camp', 'DonationCampController@index')->name('donationCamp');
Route::post('/donation-camp', 'DonationCampController@update');

Route::post('/current-camps', 'DonationCampController@currentCamps')->name('currentCamps');



Route::get('/contact-us', 'PublicController@contactUs')->name('contactUs');
Route::post('/contact-us', 'PublicController@contactUs');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::put('/inputs/{id}', 'InputController@update')->name('customVoyagerInputUpdate');
});

Route::get('/test_theme', 'PublicController@testTheme');

//Route::get('page/{slug}', function($slug) {
//    $post = App\Post::where('slug', '=', $slug)->firstOrFail();
//    return view('post', compact('post'));
//});
