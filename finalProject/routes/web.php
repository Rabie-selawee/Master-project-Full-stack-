<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| الصفحات العامة
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');

Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');

/*
|--------------------------------------------------------------------------
| لوحة التحكم - Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| المسارات المحمية (للمستخدمين المسجلين فقط)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('restaurants', RestaurantController::class)->except(['show']);

    Route::resource('dishes', DishController::class)->except(['index']);

Route::resource('orders', OrderController::class);

Route::get('/orders/create/{dish}', [OrderController::class, 'create'])
    ->name('orders.create.dish');


});

require __DIR__.'/auth.php';
