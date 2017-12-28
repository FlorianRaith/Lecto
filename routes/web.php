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

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ], function() {

    Route::get('/', 'HomeController@index')->name('index');
    Route::auth();

    Route::post('/message/post', 'MessageController@post')->name('postMessage');
    Route::post('/message/delete', 'MessageController@delete')->name('deleteMessage');

    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::get('/profile/{user_id}', 'ProfileController@show')->name('showProfile');


});