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
Route::group(['namespace' => '\App\Modules\Importer\Controller', 'prefix' => 'v1/importer/'], function () {
    Route::group(['prefix' => 'place'], function () {
        Route::get('/', 'ImporterController@list')
            ->name('importer.place.list');
        Route::get('/{place}', 'ImporterController@details')
            ->name('importer.place.details');
        Route::post('/populate', 'ImporterController@populate')
            ->name('importer.place.populate');
    });
});
