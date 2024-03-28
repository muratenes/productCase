<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('payments')->group(function () {
    Route::post('', [PaymentController::class, 'store']);
});

Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('/{product:id}', [ProductController::class, 'show']);
});

