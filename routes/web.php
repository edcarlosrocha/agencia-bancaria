<?php

use Illuminate\Support\Facades\Route;

use App\User;

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
	$data = [];
	$data['users'] = User::all();

    return view('welcome', $data);
});

Route::get('/teste', function() {
	$data = [];

    return view('welcome', $data);
});