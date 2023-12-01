<!-- resources/views/admin/accepted-restaurants.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accepted Restaurants') }}
        </h2>
    </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">All Accepted Restaurants</h3>

                <!-- Display a table of accepted restaurants -->
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Logo</th>

                            <th class="py-2 px-4 border-b">Restaurant Name</th>
                            <th class="py-2 px-4 border-b">Description</th>

                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acceptedRestaurants as $restaurant)
                        <!-- Change $restaurantApplications to $applications -->
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $restaurant->logo}}</td>

                            <td class="py-2 px-4 border-b">{{ $restaurant->restaurant_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $restaurant->description }}</td>

                            <td class="py-2 px-4 border-b">{{ $restaurant->status }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.application-details', ['id' =>$restaurant->id]) }}" class="text-blue-500 hover:underline">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>
