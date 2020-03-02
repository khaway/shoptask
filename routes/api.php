<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
    OrderController,
    ProductController,
    CatalogController,
    DeliveryTypeController,
    ProductVisitController,
    ProductCategoryController
};

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

Route::resource('orders', OrderController::class);
Route::resource('catalog', CatalogController::class);
Route::resource('products', ProductController::class);
Route::resource('delivery_types', DeliveryTypeController::class);
Route::resource('products_categories', ProductCategoryController::class);

Route::name('products_visits.increment')->post('products/visits/increment', ProductVisitController::class);
