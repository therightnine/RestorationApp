<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestaurantApplicationController;
use App\Http\Controllers\MenuApplicationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\RatingController;

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
    return view('welcome');
});
Route::get('/about-us', function () {
    return view('aboutUs');
})->name('aboutUs');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





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


Route::middleware(['auth'])->group(function () {
    // Fetch cart items or any other data you need
    $cartItems = Cart::all(); // Replace this with your actual logic to get cart items



     // Add a route to display the rating form
     Route::get('/restaurants/{restaurant}/rate', [RatingController::class, 'create'])
     ->name('ratings.create');

 // Add a route to handle the submission of the rating form
 Route::post('/restaurants/{restaurant}/rate', [RatingController::class, 'store'])
     ->name('ratings.store');

    

    // Restaurant Application routes
    Route::get('/restaurantApplications/create', function () use ($cartItems) {
        return view('restaurantApplications.create', ['cartItems' => $cartItems]);
    })->name('restaurant.application.create');

    Route::post('/restaurantApplications', function () use ($cartItems) {
        return view('restaurantApplications/createMenu', ['cartItems' => $cartItems]);
    })->name('restaurant.application.store');

    // Menu Application routes
    Route::get('/restaurantApplications/createMenu/{restaurant_id}', function ($restaurant_id) use ($cartItems) {
        return view('restaurantApplications.createMenu', ['restaurant_id' => $restaurant_id, 'cartItems' => $cartItems]);
    })->name('menu.application.create');

    Route::post('/restaurantApplications/menu', function () use ($cartItems) {
        return view('restaurantApplications.store', ['cartItems' => $cartItems]);
    })->name('menu.application.store');
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




require __DIR__.'/auth.php';