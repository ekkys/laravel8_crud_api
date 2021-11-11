<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/products', [ProductsController::class, 'index']);
    Route::get('/products/addProducts', [ProductsController::class, 'addProducts']);
    Route::post('/products/save', [ProductsController::class, 'save']);
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit']);
    Route::post('/products/update/{id}', [ProductsController::class, 'update']);
    Route::get('/products/delete/{id}', [ProductsController::class, 'delete']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
