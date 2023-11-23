<!-- resources/views/admin/applications.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Restaurant Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">All Restaurant Applications</h3>

                <!-- Display a table of restaurant applications -->
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
                        @foreach($applications as $application)
                        <!-- Change $restaurantApplications to $applications -->
                        <tr>
                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $application->logo}}</td>

                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $application->restaurant_name }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $application->description }}</td>

                            <td class="py-2 px-4 border-b dark:border-gray-700">{{ $application->status }}</td>
                            <td class="py-2 px-4 border-b dark:border-gray-700">
                                <a href="{{ route('admin.application-details', ['id' => $application->id]) }}" class="text-blue-500 hover:underline">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
