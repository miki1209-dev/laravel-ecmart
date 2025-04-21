<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
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
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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
	});

	Route::controller(CartController::class)->group(function () {
		Route::get('users/carts', 'index')->name('carts.index');
		Route::post('users/carts', 'store')->name('carts.store');
		Route::delete('users/carts', 'destroy')->name('carts.destroy');
	});
});
