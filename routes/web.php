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
    Route::group(['prefix' => 'sections/home'], function() {
        Route::get('', 'HomeSectionController@index')->name('home_section.index');

        Route::group(['prefix' => '{section_id}/collection'], function() {
            Route::get('', 'CollectionController@maintain')->name('collection.maintain');
            Route::put('', 'CollectionController@update')->name('collection.update');
            Route::delete('', 'CollectionController@destroy')->name('collection.destroy');
        });
    });
    Route::group(['prefix' => 'contacts'], function() {
        Route::get('', 'ContactController@index')->name('contacts.index');
        Route::get('{id}', 'ContactController@show')->name('contacts.show')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'banners'], function() {
        Route::get('create', 'BannerController@create')->name('banners.create');
        Route::post('create', 'BannerController@store')->name('banners.store');
        Route::get('{id}/edit', 'BannerController@edit')->name('banners.edit');
        Route::put('{id}/edit', 'BannerController@update')->name('banners.update');
        Route::delete('{id}', 'BannerController@destroy')->name('banners.destroy');
    });
});

Auth::routes();
