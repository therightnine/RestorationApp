<?php

namespace App\Http\Controllers;
// At the beginning of your controller method
\Illuminate\Support\Facades\Log::info('Controller method started');

use Illuminate\Http\Request;
use App\Models\User;

class RestaurantApplicationController extends Controller
{
    public function create()
    {
        // Add this line to get the authenticated user's restaurant application
        $application = User::find(auth()->id())->restaurantApplications()->latest()->first();

        return view('RestaurantApplications.create', compact('application'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            \DB::beginTransaction();

            $user = auth()->user(); // Assuming the user is logged in
            $application = $user->restaurantApplications()->create($request->all());

            \DB::commit();

            return redirect()->route('menu.create', ['restaurant_id' => $application->id])->with('success', 'Application submitted successfully.');
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->back()->with('error', 'Error submitting application. Please try again.');
        }
    }

}

