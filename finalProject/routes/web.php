<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// لوحة التحكم
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// صفحة المطعم الفردي
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');
// صفحة جميع الأصناف
// web.php
// web.php
Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');

// صفحة كل الطلبات
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// صفحة إنشاء طلب جديد
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');

// تخزين الطلب الجديد
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
// Routes للمستخدمين المسجلين فقط
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('restaurants', RestaurantController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('orders', OrderController::class);
});

require __DIR__.'/auth.php';
