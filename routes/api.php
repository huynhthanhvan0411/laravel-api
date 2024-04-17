<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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
Route::get('/products',[App\Http\Controllers\ProductController::class, 'index']);
Route::post('/products',[App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/{id}',[App\Http\Controllers\ProductController::class, 'show']);
Route::put('/products/{id}',[App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{id}',[App\Http\Controllers\ProductController::class, 'destroy']);
Route::delete('/products/search/name',[App\Http\Controllers\ProductController::class, 'searchName']);

Route::get('/role',[App\Http\Controllers\RoleController::class, 'index']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
