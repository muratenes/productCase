<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/auth/login', [AuthController::class, 'login'])->name('api.auth.login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('api.auth.register');

Route::middleware('auth:api')->group(function () {
    Route::prefix('payments')->group(function () {
        Route::post('', [PaymentController::class, 'store']);
    });
});

// these route can be added to auth
Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
});



