<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', [AuthController::class, 'user'])
            ->name('user');
        Route::post('logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::get('users', [UserController::class, 'index'])
            ->name('users.index');
        Route::post('users', [UserController::class, 'store'])
            ->name('users.store');
        Route::get('users/{id}', [UserController::class, 'show'])
            ->name('users.show');
        Route::put('users/{id}', [UserController::class, 'update'])
            ->name('users.update');
        Route::delete('users/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');
    });
});
