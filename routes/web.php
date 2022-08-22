<?php

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
    return view('index');
});
Route::get('/catalogue', function () {
    return view('catalogue');
});
Route::get('/catalogue/{id}}', function () {
    return view('catalogue-item');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/auth', function () {
    return view('auth');
});
