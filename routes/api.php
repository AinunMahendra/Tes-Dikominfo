<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ProductsController::class)->group(function () {
	Route::get('products', 'index');
	Route::post('products', 'store');
	Route::get('products/{id}', 'show');
	Route::put('products/{id}', 'update');
	Route::delete('products/{id}', 'destroy');
});

Route::controller(OrdersController::class)->group(function () {
	Route::get('orders', 'index');
	Route::post('orders', 'store');
	Route::get('orders/{id}', 'show');
	Route::delete('orders/{id}', 'destroy');
});
