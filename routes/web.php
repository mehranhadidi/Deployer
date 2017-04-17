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

// Protected Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index');
    Route::resource('servers', 'ServersController',['except' => [
        'create',
    ]]);
    Route::resource('servers.sites', 'SitesController',['except' => [
        'create',
    ]]);
});