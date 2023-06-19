<?php

use Movie\Api\Auth\Controllers\LoginController;
use Movie\Api\Movie\Controllers\MovieController;
use Movie\Api\Pdf\Controllers\PDFController;

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

Route::prefix('1')->group(function () {
    Route::get('movies', [MovieController::class, 'index']);
    Route::get('movies/{id}', [MovieController::class, 'show']);
    Route::post('login', [LoginController::class, 'login']);
    Route::resource('comments','\Movie\Api\Comment\Controllers\CommentController')->except(['index', 'show']);

});


Route::prefix('1')->middleware('auth:api')->group( function () {
    Route::post('movies', [MovieController::class, 'store']);
    Route::put('movies/{id}', [MovieController::class, 'update']);
    Route::delete('movies/{id}', [MovieController::class, 'destroy']);
    Route::post('movies/{id}/upload', [MovieController::class, 'uploadImage']);
});



