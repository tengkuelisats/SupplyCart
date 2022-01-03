<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::GET('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::GET('/product', [App\Http\Controllers\ProductController::class, 'index']);
Route::GET('/product/{filter}', [App\Http\Controllers\ProductController::class, 'indexFilter'])->name('product');

Route::GET('add-to-cart/{id}',[ProductController::class,'addToCart'])->name(('addToCart'));
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout');

Route::get('Order-History-List', [OrderController::class, 'orderHistoryIndex'])->name('orderHistoryIndex');
Route::post('Order-History', [OrderController::class, 'orderHistory'])->name('orderHistory');
