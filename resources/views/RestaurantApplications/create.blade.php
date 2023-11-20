<!-- resources/views/restaurant_application/create.blade.php -->

<form action="{{ route('applications.store') }}" method="post">
    @csrf
    <label for="restaurant_name">Restaurant Name:</label>
    <input type="text" name="restaurant_name" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <!-- Add other form fields as needed -->

    <button type="submit">Submit Application</button>
</form>
