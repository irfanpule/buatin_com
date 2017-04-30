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

// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/home', 'HomeController@home')->name('home');

    // route group user
    Route::group(['prefix' => 'user'], function () {
        // Settings
        Route::get('settings', 'ProfileController@view')->name('settings');
        Route::post('settings', 'ProfileController@store')->name('profile');
        Route::post('profile/name', 'ProfileController@editName')->name('profileName');
        Route::post('profile/photo', 'ProfileController@getPhoto')->name('getPhotoProfile');
        Route::post('profile/photo/crop', 'ProfileController@cropPhoto')->name('cropPhotoProfile');
    
    });


    // Portfolio
    Route::get('add/portfolio', 'PortfolioController@view')->name('addPortfolio');
    Route::post('add/portfolio', 'PortfolioController@store')->name('postPortfolio');


    // Ajax
    Route::get('ajax-kab/{provId}', 'ComboChainController@ProvId');
});

Route::get('/', 'HomeController@index');
Route::get('/{id}/{slug}', 'HomeController@singlePost')->name('singlePost');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/user/{id}/{slug}', 'HomeController@home')->name('userHome');





