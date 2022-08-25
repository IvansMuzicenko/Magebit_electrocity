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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersController;

Route::get("getAllProducts", [ProductController::class, "getAllProducts"]);
Route::get("getProductById/{id}", [ProductController::class, "getProductById"]);
Route::post("getFilteredProducts", [ProductController::class, "getFilteredProducts"]);
Route::post("addProduct", [ProductController::class, "addProduct"]);

Route::post("auth/register", [AuthController::class, "register"]);
Route::post("auth/login", [AuthController::class, "login"]);
Route::get("auth/logout", [AuthController::class, "logout"]);

Route::post("orders/placeOrder", [OrdersController::class, "placeOrder"]);
