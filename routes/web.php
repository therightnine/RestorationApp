<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantApplicationController;
use App\Http\Controllers\MenuApplicationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.all');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.single');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/restaurantApplications/create', [RestaurantApplicationController::class, 'create'])->name('restaurant.application.create');
    Route::post('/restaurantApplications', [RestaurantApplicationController::class, 'store'])->name('restaurant.application.store');

    Route::get('/restaurantApplications/createMenu/{restaurant_id}', [MenuApplicationController::class, 'create'])->name('menu.application.create');
    Route::post('/restaurantApplications/menu', [MenuApplicationController::class, 'store'])->name('menu.application.store');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/applications', [AdminDashboardController::class, 'viewApplications'])->name('admin.applications');
    Route::get('/admin/accepted-restaurants', [AdminDashboardController::class, 'viewAcceptedRestaurants'])->name('admin.accepted-restaurants');
    Route::get('/admin/denied-restaurants', [AdminDashboardController::class, 'viewDeniedRestaurants'])->name('admin.denied-restaurants');

    Route::get('/admin/application/{id}', [AdminDashboardController::class, 'viewApplicationDetails'])->name('admin.application-details');

    Route::post('/admin/accept-restaurant', [AdminDashboardController::class, 'acceptRestaurant'])->name('admin.accept-restaurant');
    Route::post('/admin/deny-restaurant', [AdminDashboardController::class, 'denyRestaurant'])->name('admin.deny-restaurant');
});

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update/{cartId}', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/{id}', [DishController::class, 'show'])->name('dishes.show');

require __DIR__.'/auth.php';
