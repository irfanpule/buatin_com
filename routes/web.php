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

Route::get('/home', 'HomeController@index');


// Settings
Route::get('user/settings', 'ProfileController@view')->name('settings');
Route::post('user/settings', 'ProfileController@store')->name('profile');
Route::post('user/profile/name', 'ProfileController@editName')->name('profileName');
Route::post('user/profile/photo', 'ProfileController@getPhoto')->name('getPhotoProfile');
Route::post('user/profile/photo/crop', 'ProfileController@cropPhoto')->name('cropPhotoProfile');


// Portfolio
Route::get('add/portfolio', 'PortfolioController@view')->name('addPortfolio');




// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Ajax
Route::get('ajax-kab/{provId}', 'ComboChainController@ProvId');