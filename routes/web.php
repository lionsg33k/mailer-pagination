<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Middleware\SellerMiddleware;
use Illuminate\Support\Facades\Route;



Route::get("/signup", [HomeController::class, "index"])->name("signup.index");
Route::get("/", [HomeController::class, "home"])->name("home.home");


Route::middleware('auth')->group(function () {
    Route::get("/seller", [SellerController::class, "index"])->name("seller.index")->middleware(SellerMiddleware::class);
    Route::get("/customer", [CustomerController::class, "index"])->name("customer.index");
});


require __DIR__ . '/auth.php';
