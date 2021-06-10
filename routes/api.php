<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
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

Route::name('auth.')
    ->group(app_path('/Http/Routes/AuthRoutes.php'));

Route::middleware('auth:sanctum')->group(function () {
    Route::get('permissions', [PermissionController::class, 'index'])
        ->name('user.permissions');

    Route::get('role', [RoleController::class, 'index'])
        ->name('role.index');
    Route::post('role', [RoleController::class, 'store'])
        ->name('role.store');
    Route::get('role/{id}', [RoleController::class, 'show'])
        ->name('role.show');
    Route::put('role/{id}', [RoleController::class, 'update'])
        ->name('role.update');
    Route::delete('role/{id}', [RoleController::class, 'destroy'])
        ->name('role.destroy');
});
