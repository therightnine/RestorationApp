<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuApplication;
use App\Models\DishApplication;
use App\Models\RestaurantApplication;

class MenuApplicationController extends Controller
{
   

public function create(Request $request, $restaurant_id = null)
{
    // If $restaurant_id is not provided in the URL parameters, check if it's in the query parameters
    if (!$restaurant_id && $request->has('restaurant_id')) {
        $restaurant_id = $request->input('restaurant_id');
    }

    // Retrieve the restaurant_id from the session
    $restaurant_id = $restaurant_id ?? session('restaurant_id');

    // Now you have $restaurant_id, and you can use it as needed
    $restaurantApplication = $restaurant_id ? RestaurantApplication::findOrFail($restaurant_id) : null;

    // Pass $restaurantApplication to the view
    return view('restaurantApplications.createMenu', compact('restaurantApplication'));
}




    public function store(Request $request)
    {
        // Update validation rules to match the form field names
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'dishes.*.name' => 'required|string|max:255',
            'dishes.*.photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dishes.*.description' => 'required|string',
            'dishes.*.price' => 'required|numeric',
            // Add other validation rules for menu and dish fields here
        ]);


        // Retrieve the restaurant_id from the session
        $restaurant_id = session('restaurant_id');
        

        // Check if the restaurant_id exists in the restaurant_applications table
    if (!RestaurantApplication::where('id', $restaurant_id)->exists()) {
        return response()->json(['error' => 'Invalid restaurant_id'], 422);
    }


        // Create a new menu application
        $menuApplication = MenuApplication::create([
            'restaurant_id' => $restaurant_id,
            'description' => $validatedData['description'],
        ]);

        // Create dish applications
        foreach ($validatedData['dishes'] as $index => $dishData) {
            // Handle file upload for the dish photo
            $dishPhotoPath = $request->file("dishes.$index.photo")->store('dish_photos', 'public');

            DishApplication::create([
                'menu_id' => $menuApplication->id,
                'name' => $dishData['name'],
                'photo' => $dishPhotoPath,
                'description' => $dishData['description'],
                'price' => $dishData['price'],
            ]);
        }

        // Clear the session variable after the restaurant application is submitted
        session()->forget('restaurant_id');

        // Redirect or perform any other actions after successful menu application submission
        return redirect()->route('welcome')->with('success', 'Menu application submitted successfully!');
    }
}
