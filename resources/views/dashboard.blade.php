<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.navbarfooter')

@section('content')

    <div class="py-12 bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Content Area with Shadow -->
            <div class="flex bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <!-- Sidebar -->
                <div class="w-1/4 bg-red-500 p-4">
                    <!-- User Information and Profile Dropdown -->
                    <div class="mb-4">
                        <div class="flex items-center text-white">
                            <i class="fas fa-user text-lg mr-2"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <div class="relative inline-block mt-2">
                            <button type="button" class="flex items-center text-white">
                                <i class="fas fa-chevron-down mr-2"></i>
                            </button>
                            <div class="origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-red-500 ring-opacity-5">
                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <!-- Dropdown items -->
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Edit Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Logout</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Icons for different sections -->
                    <ul>
                        <li class="mb-4">
                            <a href="{{ route('restaurant.application.create') }}" class="flex items-center text-white hover:text-gray-300">
                                <i class="fas fa-utensils text-lg mr-2"></i>
                                Apply for Restaurant
                            </a>
                        </li>
                        <!-- Add more icons as needed -->
                        <li class="mb-4">
                            <a href="{{ route('profile.edit') }}" class="flex items-center text-white hover:text-gray-300">
                                <i class="fas fa-user-edit text-lg mr-2"></i>
                                Edit Profile
                            </a>
                        </li>
                        <!-- Add more icons as needed -->
                        <li class="mb-4">
                            <a href="#" class="flex items-center text-white hover:text-gray-300">
                                <i class="fas fa-cog text-lg mr-2"></i>
                                Settings
                            </a>
                        </li>
                        <!-- Add more icons as needed -->
                    </ul>
                </div>

                <!-- User Information and Profile Dropdown -->
                <div class="w-3/4 p-4">
                    <!-- Your custom dashboard content goes here -->
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
@endsection

