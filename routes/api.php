<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;


Route::get('products', [ProductApiController::class, 'index']);
Route::get('products/{id}', [ProductApiController::class, 'show']);
Route::get('products/filter', [ProductApiController::class, 'filter']);
Route::get('products/sort', [ProductApiController::class, 'sort']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
