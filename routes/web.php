<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::resource("product",ProductController::class);
Route::resource("category",CategoryController::class);
Route::resource("coupon",CouponController::class);
Route::resource("order",OrderController::class);
Route::resource("order-item",OrderItemController::class);
Route::resource("address",AddressController::class);
Route::resource("home",HomeController::class);

Route::get("/",[HomeController::class,"home"])->name('home');
Route::get('/view/{id}',[HomeController::class,"view"])->name('view');
Route::get('/productview/{id}',[HomeController::class,"productview"])->name('productview');
// Route::get("/viewpro/{productId}/category/{catId}",[HomeController::class,"viewpro"])->name("viewpro");
Route::get("/search",[HomeController::class,"search"])->name('search');
Route::get("/cart",[HomeController::class,"cart"])->name('cart');
Route::get("/checkout",[HomeController::class,"checkout"])->name('checkout');
Route::get("/searchpro",[HomeController::class,"searchpro"])->name('searchpro');

Route::middleware('auth')->group(function () {
    Route::post("/add-to-cart/{id}",[HomeController::class, "add_to_cart"])->name("addCart");
    Route::post("/add-coupon",[HomeController::class, "addCoupon"])->name("addCoupon");
    Route::get("/remove-from-cart/{id}",[HomeController::class, "remove_from_cart"])->name("removeCart");
    Route::get("/remove-item-from-cart/{id}",[HomeController::class, "removeItemFromCart"])->name("removeItemCart");

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
