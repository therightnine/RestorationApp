<form method="post" action="{{ route('ratings.store', ['restaurant' => $restaurant->id]) }}">
    @csrf
    <label for="rating">Rate this restaurant (out of 5):</label>
    <input type="number" name="rating" min="1" max="5" required>
    <label for="comment">Leave a comment:</label>
    <textarea name="comment" rows="3" required></textarea>
    <button type="submit">Submit Rating</button>
</form>
