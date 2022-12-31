<?php

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
	Route::post('/users', 'store')->name('users.store');
	Route::put('/users/{user}', 'update')->name('posts.update');
	Route::delete('/users/{user}', 'destroy')->name('user.destroy');
});
