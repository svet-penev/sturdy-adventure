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

/**
 * Api route
 */
Route::namespace('Api')->group(function () {
    Route::get('/users', 'UsersController@index');
    Route::get('/users/{id}', 'UsersController@get');
    Route::post('/users', 'UsersController@store');
    Route::put('/users/{id}', 'UsersController@update');
    Route::delete('/users/{id}', 'UsersController@delete');

     /**
     * Auth route
     */
    Route::post('auth/login', 'AuthController@login');

    Route::group(['middleware' => 'jwt.auth'], function(){
      Route::get('auth/user', 'AuthController@user');
      Route::post('auth/logout', 'AuthController@logout');
    });
    
    Route::group(['middleware' => 'jwt.refresh'], function(){
      Route::get('auth/refresh', 'AuthController@refresh');
    });
});
