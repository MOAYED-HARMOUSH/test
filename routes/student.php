<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\StudentAuthController;
use App\Http\Controllers\Api\SuperAdminAuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Student Routes
Route::post('/login', [StudentAuthController::class, 'login']);

Route::prefix('student')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [StudentAuthController::class, 'logout']);
        Route::get('/dashboard', [StudentAuthController::class, 'dashboard']);
    });
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::middleware('auth:admin-api')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout']);
     });
});

// Super Admin Routes
Route::prefix('super-admin')->group(function () {
    Route::post('/login', [SuperAdminAuthController::class, 'login']);
    Route::middleware('auth:super-admin-api')->group(function () {
        Route::post('/logout', [SuperAdminAuthController::class, 'logout']);
     });
});