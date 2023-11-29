<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Users') }}
        </h2>
    </x-slot>



    <div class="container mt-5">
        <h2 class="mb-4">Admin Dashboard - View Users</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('admin.suspend-or-ban', $user->id) }}" class="btn btn-danger">Suspend/Ban</a>
                            <!-- Add more actions if needed -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>
