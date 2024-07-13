<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('categories')->group(function () {
    Route::apiResource('/', CategoryController::class);
    Route::get('search', [CategoryController::class, 'search'])->name('search');
});

Route::prefix('products')->group(function (){
    Route::apiResource('/', ProductController::class);
    Route::get('search', [ProductController::class, 'search'])->name('search');

});
