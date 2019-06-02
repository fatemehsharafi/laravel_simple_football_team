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

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::get('teams', 'TeamController@index');
Route::post('search/team', 'TeamController@search');
Route::post('search/player', 'PlayerController@search');



Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth:api',
],
    function () {

        Route::group([
            'prefix' => 'team',
        ],
            function () {
                Route::put('update/{id}', 'TeamController@update');
                Route::post('get/{id}', 'TeamController@getTeam');

            });

        Route::group([
            'prefix' => 'player',
        ],
            function () {
                Route::put('update/{id}', 'PlayerController@update');
            });
    });
