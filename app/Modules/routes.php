<?php

/*
|--------------------------------------------------------------------------
|  Module Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Importer\Controller', 'prefix' => 'api/'], function () {
    Route::group(['prefix' => 'place'], function () {
        Route::get('/list', 'ImporterController@list')
            ->name('place.list');
        Route::get('/details/{id}', 'ImporterController@details')
            ->name('place.details');
        Route::post('/populate', 'ImporterController@populate')
            ->name('place.populate');
    });
});