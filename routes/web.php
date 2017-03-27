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
Route::get('user/pengaturan', 'ProfileController@view')->name('settings');
Route::post('user/pengaturan', 'ProfileController@store')->name('profile');
Route::post('user/profile/name', 'ProfileController@editName')->name('profileName');





// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Ajax
Route::get('ajax-kab/{provId}', 'ComboChainController@ProvId');