<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FaqController;

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

Route::get('/', [WebController::class, 'index'])->name('top');

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/products', [ProductController::class, 'index'])->name('products.index');
	Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
	Route::post('/products', [ProductController::class, 'store'])->name('products.store');
	Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
	Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
	Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
	Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

	Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

	Route::post('/favorites/{product_id}', [FavoriteController::class, 'store'])->name('favorites.store');
	Route::delete('/favorites/{product_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

	Route::controller(UserController::class)->group(function () {
		Route::get('users/mypage', 'mypage')->name('mypage');
		Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
		Route::put('users/mypage', 'update')->name('mypage.update');
		Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
		Route::put('users/mypage/password', 'update_password')->name('mypage.update_password');
		Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
		Route::delete('users/mypage/destroy', 'destroy')->name('mypage.destroy');
		Route::get('users/mypage/cart_history', 'cart_history_index')->name('mypage.cart_history');
		Route::get('users/mypage/cart_history/{num}', 'cart_history_show')->name('mypage.cart_history_show');
	});

	Route::controller(CartController::class)->group(function () {
		Route::get('users/carts', 'index')->name('carts.index');
		Route::post('users/carts', 'store')->name('carts.store');
		Route::delete('users/carts', 'destroy')->name('carts.destroy');
	});

	Route::controller(CheckoutController::class)->group(function () {
		Route::get('checkout', 'index')->name('checkout.index');
		Route::post('checkout', 'store')->name('checkout.store');
		Route::get('checkout/success', 'success')->name('checkout.success');
	});
});

Route::controller(FaqController::class)->group(function () {
	Route::get('faqs', 'index')->name('faqs.index');
});
