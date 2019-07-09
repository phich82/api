<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    Route::resource('flights', v1\FlightController::class);
    Route::get('locale', 'v1\FlightController@getFileLang');

    Route::get('vendors-info', 'v1\FlightController@getVendorInfo');
    Route::get('vendors-service', 'v1\FlightController@getVendorServices');

    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', 'v1\AuthController@register');
        Route::post('login', 'v1\AuthController@login')->name('login');
        Route::post('logout', 'v1\AuthController@logout');
        Route::post('refresh', 'v1\AuthController@refresh');
        Route::post('profile', 'v1\AuthController@profile');
    });
});

