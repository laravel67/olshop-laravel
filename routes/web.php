<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Livewire\Products;
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

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/shop', function () {
    return view('shop.index');
})->name('shop');

Route::get('/admin/products', ProductController::class)->name('admin.product');

Route::get('/shop/cart', function () {
    return view('shop.cart');
})->name('cart');

Route::get('/shop/checkout', function () {
    return view('shop.checkout');
})->name('checkout');
