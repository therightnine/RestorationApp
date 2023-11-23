<!-- resources/views/admin/application-details.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Application Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Application Details</h3>

                <!-- Display details of the restaurant application -->
                <p class="mb-4"><strong>Restaurant Name:</strong> {{ $restaurantApplication->restaurant_name }}</p>
                <p class="mb-4"><strong>Description:</strong> {{ $restaurantApplication->description }}</p>
                <p class="mb-4"><strong>Status:</strong> {{ $restaurantApplication->status }}</p>

                <!-- Additional details if needed -->

                <!-- Accept and Deny buttons -->
                <form action="{{ route('admin.accept-restaurant') }}" method="post" class="inline">
                    @csrf
                    <input type="hidden" name="application_id" value="{{ $restaurantApplication->id }}">
                    <button type="submit" class="text-green-500 hover:underline">Accept</button>
                </form>
                <form action="{{ route('admin.deny-restaurant') }}" method="post" class="inline ml-2">
                    @csrf
                    <input type="hidden" name="application_id" value="{{ $restaurantApplication->id }}">
                    <button type="submit" class="text-red-500 hover:underline">Deny</button>
                </form>

                <a href="{{ route('admin.applications') }}" class="text-blue-500 hover:underline ml-2">Back to Applications</a>
            </div>
        </div>
    </div>
</x-app-layout>
