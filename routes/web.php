<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductController::class)
    ->prefix('/products')
    ->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::get('/add', 'add')->name('products.add');
        Route::post('/store', 'store')->name('products.store');

        Route::get('/edit/{id}', 'edit')
            ->where('id', '[0-9]+')
            ->name('products.edit');
        Route::post('/update/{id}', 'update')
            ->where('id', '[0-9]+')
            ->name('products.update');

        Route::post('/delete/{id}', 'delete')
            ->where('id', '[0-9]+')
            ->name('products.delete');
    });

Route::controller(DocumentController::class)
    ->prefix('/documents')
    ->group(function () {
        Route::get('/', 'index')->name('documents.index');
        Route::get('/{id}', 'show')->name('documents.show')
            ->where('id', '[0-9]+');
        Route::get('/add', 'add')->name('documents.add');
    });
