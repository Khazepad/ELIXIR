<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();


// Product routes
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/choice', function () {
    return view('auth.choice');
})->name('choice');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
});
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [App\Http\Controllers\ProductController::class, 'adminCreate'])->name('admin.products.create');
    Route::post('/admin/products', [App\Http\Controllers\ProductController::class, 'adminStore'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'adminEdit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [App\Http\Controllers\ProductController::class, 'adminUpdate'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [App\Http\Controllers\ProductController::class, 'adminDestroy'])->name('admin.products.destroy');
});

// admin dashboard
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');
// views/products/index 
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
// sa cart ni dzaii para ma handle nya ang views duhhh
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('place.order');
// Para makita ang receipt
Route::get('/order/receipt/{order}', [CartController::class, 'showReceipt'])->name('order.receipt');

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
    Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/report', [OrderController::class, 'report'])->name('admin.orders.report');
});

Route::get('/admin/orders', [App\Http\Controllers\OrderController::class, 'adminIndex'])->name('admin.orders.index');
Route::get('/admin/orders/{order}', [App\Http\Controllers\OrderController::class, 'adminShow'])->name('admin.orders.show');
// Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::resource('users', UserController::class)->names('admin.users');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

require __DIR__.'/auth.php';
