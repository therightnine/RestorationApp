<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2 text-red-500">Admin Actions</h3>
                    <div class="bg-red-200 p-4 rounded-md">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left">Action</th>
                                    <th class="text-right">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>View Restaurant Applications</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.applications') }}" class="text-blue-500 hover:underline">Go</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>View Accepted Restaurants</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.accepted-restaurants') }}" class="text-green-500 hover:underline">Go</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>View Denied Restaurants</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.denied-restaurants') }}" class="text-green-500 hover:underline">Go</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                <!-- Card 1: Restaurant Statistics -->
                <div class="bg-red-200 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-2 text-blue-500">Restaurant Statistics</h3>
                    <p class="text-gray-600">Total Restaurants: 100</p>
                    <p class="text-gray-600">Active Restaurants: 80</p>
                    <p class="text-gray-600">Pending Applications: 10</p>
                    <!-- Add a Chart.js chart -->
                    <canvas id="restaurantChart" width="200" height="150"></canvas>
                </div>

                <!-- Card 2: User Statistics -->
                <div class="bg-red-200 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-2 text-green-500">User Statistics</h3>
                    <p class="text-gray-600">Total Users: 500</p>
                    <p class="text-gray-600">Active Users: 450</p>
                    <p class="text-gray-600">Inactive Users: 50</p>
                    <!-- Add a Chart.js chart -->
                    <canvas id="userChart" width="200" height="150"></canvas>
                </div>

                <!-- Card 3: Add more cards as needed -->

                <!-- Card 4: Add more cards as needed -->
            </div>
        </div>
    </div>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart.js script for Restaurant Statistics -->
    <script>
        var ctxRestaurant = document.getElementById('restaurantChart').getContext('2d');
        var restaurantChart = new Chart(ctxRestaurant, {
            type: 'bar',
            data: {
                labels: ['Total', 'Active', 'Pending'],
                datasets: [{
                    label: 'Restaurant Statistics',
                    data: [100, 80, 10],
                    backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(75, 192, 192, 0.7)', 'rgba(255, 206, 86, 0.7)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Chart.js script for User Statistics -->
    <script>
        var ctxUser = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctxUser, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Inactive'],
                datasets: [{
                    label: 'User Statistics',
                    data: [450, 50],
                    backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            }
        });
    </script>
        
</x-app-layout>