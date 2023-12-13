<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\SubCategoryController;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::resource('categories', CategoryController::class)->only('index', 'show');
Route::resource('subCategories', SubCategoryController::class)->only('index', 'show');
Route::resource('items', ItemController::class)->only('index', 'show');

Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    Route::resource('orders', OrderController::class)->only('destroy');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('orders', OrderController::class)->only('index', 'show');
    Route::get('logout', [AuthController::class, 'logout']);
});
