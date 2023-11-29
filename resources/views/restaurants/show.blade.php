<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $restaurant->name }} - Détails du Restaurant</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .restaurant-details {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .menu-list {
            list-style: none;
            padding: 0;
        }

        .menu-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
        }

        .rating-list {
            list-style: none;
            padding: 0;
        }

        .rating-item {
            background-color: #f0f8ff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
        }

        /* Style pour le formulaire d'ajout au panier */
        form {
            margin-top: 10px;
        }

        label {
            margin-right: 10px;
        }

        input {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
        }

        button {
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>{{ $restaurant->name }} - Détails du Restaurant</h1>
</header>

<div class="container">
    <div class="restaurant-details">
        <h2>Description</h2>
        <p>{{ $restaurant->description }}</p>
        
        <p>Rating: {{ $restaurant->rating }}</p>
        <p>Location: {{ $restaurant->location }}</p>
    </div>

    <h2>Menus</h2>
    <ul class="menu-list">
        @foreach($restaurant->menus as $menu)
            <li class="menu-item">
                {{ $menu->name }}
                <ul>
                        @foreach($menu->dishes as $dish)
                            <li>
                                {{ $dish->name }} - ${{ $dish->price }}
                                <!-- Add Item Form -->
                                <form action="{{ route('cart.add', ['dishId' => $dish->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                                    <button type="submit">Add to Cart</button>
                                </form>

                            </li>
                        @endforeach
                </ul>
            </li>
        @endforeach

    </ul>

    <h2>Ratings</h2>
    <ul class="rating-list">
        @foreach($restaurant->ratings as $rating)
            <li class="rating-item">
                <strong>User:</strong> {{ $rating->user->name }}<br>
                Rating: {{ $rating->rating }}<br>
                <strong>Review:</strong> {{ $rating->review }}
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
