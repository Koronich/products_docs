<?php

use App\Http\Controllers\Api\DocumentController;
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

Route::controller(DocumentController::class)
    ->prefix('/documents')
    ->group(function () {
        Route::post('/store', 'store')->name('documents.store');
    });
