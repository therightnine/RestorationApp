<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $restaurant->name }} - Détails du Restaurant</title>
    <style>
        .navbar-brand img {
            max-height: 100px;
        }

        .nav-link {
            color: red !important;
            margin: 0 10px;
        }

        .navbar-brand,
        .navbar-brand:hover,
        .navbar-brand:focus {
            color: black !important;
        }

        .navbar-brand img {
            transition: transform 0.3s ease-in-out;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .navbar-brand,
        .nav-link {
            font-weight: bold;
        }

        .navbar-brand,
        .nav-link:hover {
            color: red !important;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-image: url(assets/back5.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 1900px;
            color: #185039;
            font-family: 'Bebas Neue', cursive;
            padding: 20px;
            text-align: center;
            padding: 20px;
           
            
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
            background-image: url(assets/back3.jpg);
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-family: 'Bebas Neue', cursive;
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
             font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
            font-family: 'Bebas Neue', cursive;
      
        padding-bottom: 40px;
        color: #185039;
        -webkit-animation: glow 3s ease-in-out infinite alternate;
  -moz-animation: glow 3s ease-in-out infinite alternate;
  animation: glow 5s ease-in-out infinite alternate;
        }

        .rating-list {
            list-style: none;
            padding: 0;
        }
         a{
            font-family: 'Bebas Neue', cursive;
            color: #a54150;
        }

        .rating-item {
            background-color: #f0f8ff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Bebas Neue', cursive;
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
            background-color: #a54150;
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
            <h3>{{ $menu->name }}</h3>
            <ul>
                @foreach($menu->dishes as $dish)
                    <li>
                        <h4>{{ $dish->name }} - {{ $dish->price }} TND</h4>
                        @if($dish->picture)
                            <img  src="{{ asset($dish->picture) }}"  alt="{{ $dish->name }}" style="max-width: 300px; max-height: 200px;">
                        @else
                            <!-- Provide a default image or text if no picture is available -->
                            <p>No picture available</p>
                        @endif

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
<a href="{{ route('ratings.create', ['restaurant' => $restaurant->id]) }}">Write A Review</a>
<ul class="rating-list">
    @foreach($restaurant->ratings as $rating)
        <li class="rating-item">
            <div style="display: flex; align-items: center;">
                @if($rating->user->picture)
                    <img src="{{ asset($rating->user->picture) }}" alt="{{ $rating->user->name }}" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                @else
                    <!-- Provide a default image or text if no picture is available -->
                    <div style="width: 50px; height: 50px; background-color: #ccc; border-radius: 50%; margin-right: 10px;"></div>
                @endif

                <div>
                    <strong>User:</strong> {{ $rating->user->name }}<br>
                    Rating: {{ $rating->rating }}<br>
                    <strong>Review:</strong> {{ $rating->review }}
                </div>
            </div>
        </li>
    @endforeach
</ul>

</div>

</body>
</html>
