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

Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'book'])->name('book');

Route::get('/bookall', [App\Http\Controllers\BookController::class, 'bookAuth'])->middleware('jwt.verify');
Route::get('/user', [App\Http\Controllers\UserController::class, 'getAuthenticatedUser'])->middleware('jwt.verify');
