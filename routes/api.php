<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// USER
Route::middleware(['auth:sanctum', 'request.counter'])->group(function () {
    Route::get('/assets', [AssetsController::class, 'index']);
});

// ADMIN
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/{user}/request-count', [UserController::class, 'requestCount']);

    Route::patch('/users/{user}/plan', [UserController::class, 'setPlan']);

    Route::apiResource('/plans', PlansController::class);
});
