<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantApplicationController;
use App\Http\Controllers\MenuApplicationController;


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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/restaurantApplications/create', [RestaurantApplicationController::class, 'create'])->name('restaurant.application.create');
    Route::post('/restaurantApplications', [RestaurantApplicationController::class, 'store'])->name('restaurant.application.store');

    Route::get('/restaurantApplications/createMenu/{restaurant_id}', 'MenuApplicationController@create')->name('menu.application.create');
    Route::post('/restaurantApplications/menu', [MenuApplicationController::class, 'store'])->name('menu.application.store');
});



require __DIR__.'/auth.php';


