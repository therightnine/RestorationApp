<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantApplicationController;
use App\Http\Controllers\MenuApplicationController;
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\RatingController; // Import the RatingController

use App\Http\Controllers\CartController;

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Models\Cart;

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
    // Fetch cart items or any other data you need
    $cartItems = Cart::all(); // Replace this with your actual logic to get cart items

    // Pass data to the view
    return view('welcome', ['cartItems' => $cartItems]);
})->name('welcome');

 


Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.all');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.single');


Route::middleware('auth')->group(function () {
    // Fetch cart items or any other data you need
    $cartItems = Cart::all(); // Replace this with your actual logic to get cart items

    Route::get('/dashboard', function () use ($cartItems) {
        return view('dashboard', ['cartItems' => $cartItems]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Profile routes
    Route::get('/profile', function () use ($cartItems) {
        return view('profile.edit', ['cartItems' => $cartItems]);
    })->name('profile.edit');

    Route::patch('/profile', function () use ($cartItems) {
        return view('profile.update', ['cartItems' => $cartItems]);
    })->name('profile.update');

    Route::delete('/profile', function () use ($cartItems) {
        return view('profile.destroy', ['cartItems' => $cartItems]);
    })->name('profile.destroy');

    // Restaurant Application routes
    Route::get('/restaurantApplications/create', function () use ($cartItems) {
        return view('restaurant.application.create', ['cartItems' => $cartItems]);
    })->name('restaurant.application.create');

    Route::post('/restaurantApplications', function () use ($cartItems) {
        return view('restaurant.application.store', ['cartItems' => $cartItems]);
    })->name('restaurant.application.store');

    // Menu Application routes
    Route::get('/restaurantApplications/createMenu/{restaurant_id}', function ($restaurant_id) use ($cartItems) {
        return view('menu.application.create', ['restaurant_id' => $restaurant_id, 'cartItems' => $cartItems]);
    })->name('menu.application.create');

    Route::post('/restaurantApplications/menu', function () use ($cartItems) {
        return view('menu.application.store', ['cartItems' => $cartItems]);
    })->name('menu.application.store');

<<<<<<< HEAD
    Route::get('/restaurantApplications/createMenu/{restaurant_id}', [MenuApplicationController::class, 'create'])->name('menu.application.create');
    Route::post('/restaurantApplications/menu', [MenuApplicationController::class, 'store'])->name('menu.application.store');

    //rootviewRating
   

    Route::get('/restaurants/{restaurant}/rate', [RatingController::class, 'create'])->name('restaurants.rate');
    Route::post('/restaurants/{restaurant}/rate', [RatingController::class, 'store'])->name('restaurants.storeRating');
    

=======
>>>>>>> 91d53e409d840811d2a2c30b317cf4335abaf7db
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

Route::post('/cart/add/{dishId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::GET('/cart/update/{cartId}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/{id}', [DishController::class, 'show'])->name('dishes.show');

require __DIR__.'/auth.php';
