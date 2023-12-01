<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('restaurants.rate', compact('restaurant'));
    }

    public function store(Request $request, $restaurantId)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $rating = new Rating([
            'user_id' => auth()->user()->id,
            'restaurant_id' => $restaurantId,
            'rating' => $request->input('rating'),
            'review' => $request->input('comment'),
        ]);

        $rating->save();

        return redirect()->route('restaurants.show', ['restaurant' => $restaurantId])
            ->with('success', 'Thank you for your rating!');
    }
}

