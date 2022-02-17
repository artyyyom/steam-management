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

/* Auth */
Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth:sanctum');

/* items routes */
Route::resource('items', \App\Http\Controllers\ItemController::class);
Route::get('getItemsByCategory/{categoryId}', [\App\Http\Controllers\ItemController::class, 'getItemsByCategory']);

/* categories routes */
Route::resource('categories', \App\Http\Controllers\CategoryController::class);

/* steam api routes */
Route::post('updatePrice', [\App\Http\Controllers\SteamApiController::class, 'getCurrentItemPrice']);
