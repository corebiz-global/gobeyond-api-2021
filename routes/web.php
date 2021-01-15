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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController')->name('dashboard');

    Route::group(['prefix' => 'contacts'], function() {
        Route::get('', 'ContactController@index')->name('contacts.index');
        Route::get('{id}', 'ContactController@show')->name('contacts.show')->where('id', '[0-9]+');
    });
});

Auth::routes();
