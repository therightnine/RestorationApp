<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="mt-4">
                        <h3 class="text-lg font-semibold mb-2">Admin Actions</h3>
                        <ul class="list-disc pl-4">
                            <li><a href="{{ route('admin.applications') }}" class="text-blue-500 hover:underline">View Restaurant Applications</a></li>
                            <li><a href="{{ route('admin.accepted-restaurants') }}" class="text-green-500 hover:underline">View Accepted Restaurants</a></li>
                            <li><a href="{{ route('admin.denied-restaurants') }}" class="text-green-500 hover:underline">View Denied Restaurants</a></li>

                        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>