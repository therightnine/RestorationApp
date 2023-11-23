<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantApplication;
use App\Models\Restaurant;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function viewApplications()
    {
        $applications = RestaurantApplication::where('status', 'pending')->get();
        return view('admin.applications', compact('applications'));
    }

    public function viewAcceptedRestaurants()
    {
        $acceptedRestaurants = RestaurantApplication::where('status', 'approved')->get();
        return view('admin.accepted-restaurants', compact('acceptedRestaurants'));
    }

    public function viewDeniedRestaurants()
    {
        $deniedRestaurants = RestaurantApplication::where('status', 'rejected')->get();
        return view('admin.denied-restaurants', compact('deniedRestaurants'));
    }

    public function viewApplicationDetails($id)
    {
        $application = RestaurantApplication::findOrFail($id);
        return view('admin.application-details', compact('application'));
    }

    public function acceptRestaurant(Request $request)
    {
        $this->updateApplicationStatus($request->input('application_id'), 'approved');
        return redirect()->route('admin.applications')->with('success', 'Restaurant application accepted successfully.');
    }

    public function denyRestaurant(Request $request)
    {
        $this->updateApplicationStatus($request->input('application_id'), 'rejected');
        return redirect()->route('admin.applications')->with('success', 'Restaurant application denied successfully.');
    }

    private function updateApplicationStatus($applicationId, $status)
    {
        $application = RestaurantApplication::findOrFail($applicationId);
        $application->update(['status' => $status]);
    }
}
