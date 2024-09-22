<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

// Route::controller(ProductsController::class)->group(function () {
// 	Route::get('api/products', 'index');
// 	Route::post('api/products', 'store');
// });
