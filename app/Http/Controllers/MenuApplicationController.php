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

    // Now you have $restaurant_id, and you can use it as needed

    $restaurantApplication = $restaurant_id ? RestaurantApplication::findOrFail($restaurant_id) : null;

    // Pass $restaurantApplication to the view
    return view('restaurantApplications.createMenu', compact('restaurantApplication'));
}

    



    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'dish_name.*' => 'required|string|max:255',
            'dish_photo.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dish_description.*' => 'required|string',
            'dish_price.*' => 'required|numeric',
            // Add other validation rules for menu and dish fields here
        ]);

        // Retrieve the restaurant_id from the session
        $restaurant_id = session('restaurant_id');

        // Create a new menu application
        $menuApplication = MenuApplication::create([
            'restaurant_id' => $restaurant_id,
            'description' => $validatedData['description'],
        ]);

        // Create dish applications
        foreach ($validatedData['dish_name'] as $index => $dishName) {
            // Handle file upload for the dish photo
            $dishPhotoPath = $request->file("dish_photo.$index")->store('dish_photos', 'public');

            DishApplication::create([
                'menu_id' => $menuApplication->id,
                'name' => $dishName,
                'photo' => $dishPhotoPath,
                'description' => $validatedData['dish_description'][$index],
                'price' => $validatedData['dish_price'][$index],
            ]);
        }

        // Clear the session variable after the restaurant application is submitted
        session()->forget('restaurant_id');

        // Redirect or perform any other actions after successful menu application submission
        return redirect()->route('home')->with('success', 'Menu application submitted successfully!');
    }
}
