<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewsController;

Route::post('signin', [AuthController::class, 'signin']);
Route::post('signup', [AuthController::class, 'signup']);
Route::get('news', [NewsController::class, 'index']);
     
// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('blogs', BlogController::class);
// });
