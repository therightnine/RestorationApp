<!-- resources/views/admin/denied-restaurants.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Denied Restaurants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">All Denied Restaurants</h3>
                <!-- Display a table of denied restaurants -->
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b dark:border-gray-700">Logo</th>

                            <th class="py-2 px-4 border-b dark:border-gray-700">Restaurant Name</th>
                            <th class="py-2 px-4 border-b dark:border-gray-700">Description</th>

                            <th class="py-2 px-4 border-b dark:border-gray-700">Status</th>
                            <th class="py-2 px-4 border-b dark:border-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deniedRestaurants as $restaurant)
                        <!-- Change $restaurantApplications to $applications -->
                        <tr>
                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $restaurant->logo}}</td>

                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $restaurant->restaurant_name }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $restaurant->description }}</td>

                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $restaurant->status }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-700">
                                <a href="{{ route('admin.application-details', ['id' => $restaurant->id]) }}" class="text-blue-500 hover:underline">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
