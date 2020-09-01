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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group(['middleware' => 'auth:api'], function (){
    Route::group(['prefix' => 'tiporequest'], function (){
        Route::get('/','RequestTypeController@index');
        Route::get('/{id}','RequestTypeController@find');
        Route::post('/','RequestTypeController@store');
        Route::put('/{id}','RequestTypeController@update');
        Route::delete('/{id}','RequestTypeController@destroy');
    });
    Route::group(['prefix' => 'categorias'], function (){
        Route::get('/','CategoryController@index');
        Route::get('/{id}','CategoryController@find');
        Route::post('/','CategoryController@store');
        Route::put('/{id}','CategoryController@update');
        Route::delete('/{id}','CategoryController@destroy');
    });

    Route::group(['prefix' => 'requests'], function (){
        Route::get('/','RequestController@index');
        Route::get('/{id}','RequestController@find');
        Route::post('/','RequestController@store');
        Route::put('/{id}','RequestController@update');
        Route::delete('/{id}','RequestController@destroy');
        Route::put('updatePeticion/{id}','RequestController@updatePeticion');
        Route::put('updateRespuesta/{id}','RequestController@updateRespuesta');
    });
});


