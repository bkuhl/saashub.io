<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return view('home');
});

Route::get('/browse', 'BrowseController@index');
Route::get('/browse/{slug}', 'CategoryController@view');
Route::get('/service/{id}/go', 'ServiceController@redirect');
Route::get('/contact', 'ContactController@getContact');
Route::post('/contact', 'ContactController@postContact');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

/**
 * Admin Routes
 */
Route::group([
    'prefix'    => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('dashboard', 'DashboardController@index');

    Route::resource('category', 'CategoryController');
    Route::resource('service', 'ServiceController');
});
