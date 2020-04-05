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

Route::prefix('v1')->group(function () {

    Route::namespace('Api')->group(function () {

        Route::group(
            [
                'prefix' => 'admin',
                'as' => 'admin.',
                'namespace' => 'Admin',
                'middleware' => ['auth'],
            ],
            function () {
                Route::get('/supports', 'SupportController@allSupports')->name('supports.all');
            });

    });

});
