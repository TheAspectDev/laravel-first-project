<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SetAcceptHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([setAcceptHeader::class])->group(function () {
    Route::apiResource('auth', AuthController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource("users", UserController::class)->only(['store', 'show', 'index']);
    Route::apiResource("categories", CategoryController::class)->only(['index', 'show']);
});
