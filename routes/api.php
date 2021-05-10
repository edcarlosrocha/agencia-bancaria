<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers;
use \Api\UsersController;
use \Api\TransactionsController;

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

Route::post('/v1/user', "Api\UsersController@store");

Route::prefix('v1')->middleware('auth:api')->group(function () {
	// User
	Route::resource('user', UsersController::class)
		 ->except(['store']);

	// Transaction
	Route::resource('transaction', TransactionsController::class);
});
