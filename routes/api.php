<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
