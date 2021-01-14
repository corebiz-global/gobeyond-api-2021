<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'contacts'], function() {
    // Route::get('', 'Api\ContactController@index');
    // Route::get('{id}', 'Api\ContactController@find');
    Route::post('', 'Api\ContactController@store');
    // Route::put('{id}', 'Api\ContactController@update');
    // Route::patch('{id}', 'Api\ContactController@update');
    // Route::delete('{id}', 'Api\ContactController@destroy');
});

Route::get('sections/home', 'Api\HomeSectionController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
