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

Route::get('teams', 'TeamController@index');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
],
    function () {

        Route::group([
            'prefix' => 'team',
        ],
            function () {
                Route::put('update/{id}', 'TeamController@update');

            });

        Route::group([
            'prefix' => 'player',
        ],
            function () {
                Route::put('update/{id}', 'PlayerController@update');
            });
    });
