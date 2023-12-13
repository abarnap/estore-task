<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [MasterController::class, 'index']);

Route::get('shops/{categorySlug}', [ShopController::class, 'byCategory']);
Route::get('shops/{categorySlug}/{subCategorySlug}', [ShopController::class, 'bySubCategory']);
Route::get('shops/{categorySlug}/{subCategorySlug}/{itemSlug}', [ShopController::class, 'byItem']);

Route::get('checkout/{item}', [CheckoutController::class, 'index']);
Route::post('placeOrder', [CheckoutController::class, 'placeOrder']);

Route::get('login', [MasterController::class, 'login']);
Route::get('register', [MasterController::class, 'register']);
Route::post('loginSubmit', [AuthController::class, 'login']);
Route::post('registerSubmit', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);

Route::middleware('customer_guard')->group(function () {
    Route::get('myOrders', [MasterController::class, 'myOrders']);
});
