<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;
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

Route::post('login', [LoginController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('products', [ProductController::class, 'get']);
    Route::post('products/create', [ProductController::class, 'create']);
    Route::post('products/update/{id}', [ProductController::class, 'update']);
    Route::delete('products/delete/{id}', [ProductController::class, 'delete']);
    Route::get('products/get/{id}', [ProductController::class, 'getById']);
    Route::post('logout', [LoginController::class, 'logout']);
});


