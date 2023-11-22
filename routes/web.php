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
});

require __DIR__.'/auth.php';




Route::middleware(['auth'])->group(function () {
    // Restaurant Application Routes
    Route::get('/applications/create', [RestaurantApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [RestaurantApplicationController::class, 'store'])->name('applications.store');

    // Menu Application Routes
    // Add a named route for the menu create page with a parameter
    Route::get('/menu/create/{restaurant_id}', [MenuApplicationController::class, 'create'])->name('menu.create');

    // Add a named route for the menu store action
    Route::post('/menu', [MenuApplicationController::class, 'store'])->name('menu.store');

});
