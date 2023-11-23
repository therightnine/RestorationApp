<!-- resources/views/admin/accepted-restaurants.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Accepted Restaurants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">All Accepted Restaurants</h3>

                <!-- Display a table of accepted restaurants -->
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b dark:border-gray-700">Restaurant Name</th>
                            <th class="py-2 px-4 border-b dark:border-gray-700">Description</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acceptedRestaurants as $restaurant)
                        <tr>
                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $restaurant->restaurant_name }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $restaurant->description }}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
