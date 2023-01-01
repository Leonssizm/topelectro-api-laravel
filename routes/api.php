<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// User
Route::group(['controller' => UserController::class], function () {
	Route::get('/users', 'index')->name('users.index');
	Route::get('/users/{user}', 'get')->name('users.get');
	// // get user's address
	// Route::get('/address/{user_id}', 'address')->name('user.address');

	Route::post('/users', 'store')->name('users.store');
	Route::put('/users/{user}', 'update')->name('posts.update');
	Route::delete('/users/{user}', 'destroy')->name('user.destroy');
});

// Address
Route::controller(AddressController::class)->group(function () {
	Route::get('/addresses', 'index')->name('addresses.index');
	Route::get('/addresses/{address}', 'get')->name('addresses.get');
	Route::delete('/addresses/{address}', 'destroy')->name('address.destroy');
});

// Comments
Route::controller(CommentController::class)->group(function () {
	Route::get('/comments', 'index')->name('comments.index');
	Route::get('/comments/{comment}', 'get')->name('comments.get');
	// Route::post('/comments', 'store')->name('comments.store');
	Route::delete('/comments/{comment}', 'destroy')->name('comment.destroy');
});

// Products
Route::controller(ProductController::class)->group(function () {
	Route::get('/products', 'index')->name('products.index');
	Route::get('/products/{product}', 'get')->name('products.get');
	// Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});

// Categories
Route::controller(CategoryController::class)->group(function () {
	Route::get('/categories', 'index')->name('category.index');
	Route::get('/categories/{category}', 'get')->name('category.get');
});
