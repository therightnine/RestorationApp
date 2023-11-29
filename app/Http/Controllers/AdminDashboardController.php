<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantApplication;
use App\Models\User;
use App\Models\Rating;
use App\Models\Order;


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
        return redirect()->route('admin.accepted-restaurants')->with('success', 'Restaurant application accepted successfully.');
    }

    public function denyRestaurant(Request $request)
    {
        $this->updateApplicationStatus($request->input('application_id'), 'rejected');
        return redirect()->route('admin.denied-restaurants')->with('success', 'Restaurant application denied successfully.');
    }

    private function updateApplicationStatus($applicationId, $status)
    {
        $application = RestaurantApplication::findOrFail($applicationId);
        $application->update(['status' => $status]);
    }


    public function viewUsers()
    {
        $users = User::all();
        return view('admin.view-users', compact('users'));
    }

   
    public function suspendOrBanUser($id)
    {
        $user = User::findOrFail($id);
    
        // Check if the user has made inappropriate comments in ratings
        $inappropriateComments = Rating::where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('comment', 'like', '%bad_word%')
                      ->orWhere('comment', 'like', '%curse%');
            })
            ->get();
    
        // Check if the user has unresponsive orders
        $unresponsiveOrders = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->where('created_at', '<', now()->subHours(2)) // Check if order is pending for more than 5 hours
            ->get();
    
        // Implement your logic to delete comments and/or delete the user based on conditions
        foreach ($inappropriateComments as $comment) {
            // Delete the inappropriate comment
            $comment->delete();
        }
    
        if ($unresponsiveOrders->count() > 5 || $inappropriateComments->count() > 5) {
            $unresponsiveOrders->each->delete();
            // Delete the user's account
            $user->delete();
            $message = 'User account deleted successfully.';
        } 
    
        return redirect()->route('admin.view-users')->with('success', $message ?? 'No action taken.');
    }
    
}


 
