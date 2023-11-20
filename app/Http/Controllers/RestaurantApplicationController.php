<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantApplicationController extends Controller
{
        public function create()
    {
        return view('RestaurantApplications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        $user = auth()->user(); // Assuming the user is logged in
        $application = $user->restaurantApplications()->create($request->all());

        return redirect()->route('welcome')->with('success', 'Application submitted successfully.');
    }

}
