<?php

namespace App\Http\Controllers;

use App\Models\MenuApplication;
use App\Models\DishApplication;
use Illuminate\Http\Request;

class MenuApplicationController extends Controller
{
    public function create(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');

        return view('RestaurantApplications.createMenu', compact('restaurantId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurant_applications,id',
            'menu_name' => 'required|string|max:255',
            'description' => 'required|string',
            'dishes' => 'required|array',
            'dishes.*.name' => 'required|string|max:255',
            'dishes.*.photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dishes.*.description' => 'required|string',
            'dishes.*.price' => 'required|numeric|min:0',
        ]);

        try {
            \DB::beginTransaction();

            $menu = MenuApplication::create([
                'restaurant_id' => $request->input('restaurant_id'),
                'menu_name' => $request->input('menu_name'),
                'description' => $request->input('description'),
            ]);

            foreach ($request->input('dishes') as $dishData) {
                $dish = new DishApplication([
                    'name' => $dishData['name'],
                    'description' => $dishData['description'],
                    'price' => $dishData['price'],
                    'photo' => $dishData['photo'],
                ]);

                $menu->dishes()->save($dish);
            }

            \DB::commit();

            return redirect()->route('welcome')->with('success', 'Menu Application submitted successfully.');
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->back()->with('error', 'Error submitting menu application. Please try again.');
        }
    }
}
