<?php
// app/Http/Controllers/RestaurantApplicationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantApplication;

class RestaurantApplicationController extends Controller
{
    public function create()
    {
        // Check if the user is coming from the menu application and if a restaurant_id is provided
        $restaurant_id = session('restaurant_id');

        // If a restaurant_id is provided, load the existing restaurant application
        if ($restaurant_id) {
            $restaurantApplication = RestaurantApplication::findOrFail($restaurant_id);
        } else {
            // If not, create a new restaurant application
            $restaurantApplication = new RestaurantApplication();
        }

        return view('restaurantApplications.create', compact('restaurantApplication'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'restaurant_id'=>['required|integer'],
        'restaurant_name' => 'required|string|max:255',
        'description' => 'required|string',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'location' => 'required|string',
        // Add other validation rules for restaurant fields here
    ]);

    // Handle file upload for the logo
    $logoPath = $request->file('logo')->store('logos', 'public');

    // Create a new restaurant application
    $restaurantApplication = RestaurantApplication::create([
        'restaurant_id' => $validatedData['restaurant_id'],
        'restaurant_name' => $validatedData['restaurant_name'],
        'description' => $validatedData['description'],
        'logo' => $logoPath,
        'location' => $validatedData['location'],
        'user_id' => auth()->id(),
    ]);

    // Example of setting the session variable
    session(['restaurant_id' => $restaurantApplication->restaurant_id]);


    // Pass the restaurantApplication to the menu creation view
    return view('restaurantApplications.createMenu', compact('restaurantApplication'));
}

}
