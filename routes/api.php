<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::controller(CategoryController::class)->group(function () {
	Route::get('/categories', 'index')->name('categories.index');
	Route::get('/categories/{category}', 'get')->name('categories.get');
	Route::post('/categories', 'store')->name('categories.store');
	Route::put('/categories/{category}', 'update')->name('categories.update');
	Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
});

Route::controller(ProductController::class)->group(function () {
	Route::get('/products', 'index')->name('products.index');
	Route::get('/products/{product}', 'get')->name('products.get');
	Route::post('/products', 'store')->name('products.store');
	Route::put('/products/{product}', 'update')->name('products.update');
	Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});
