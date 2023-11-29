<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Restaurants</title>
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .restaurant-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .restaurant-item {
            background-color: #fff;
            border: 1px solid #ddd;
            width: calc(30% - 20px); /* Ajuster la largeur selon votre conception */
            margin-bottom: 20px;
            border-radius: 10px;
            box-sizing: border-box;
            position: relative;
            text-align: center;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .restaurant-item:hover {
            transform: scale(1.05);
        }

        .restaurant-logo {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .restaurant-details {
            padding: 20px;
        }

        .restaurant-name {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
            display: block; /* Pour rendre le lien cliquable sur toute la largeur */
        }

        .restaurant-name:hover {
            color: #e44d26; /* Change color on hover */
        }
    </style>
</head>
<body>

<header>
    <h1>Liste des Restaurants</h1>
</header>

<div class="container">
    <ul class="restaurant-list">
        @foreach($restaurants as $restaurant)
            <li class="restaurant-item">
                <a href="/restaurants/{{ $restaurant->id }}" class="restaurant-link">
                    <img src="{{ asset('assets/' . $restaurant->logo) }}" alt="Restaurant logo" class="restaurant-logo">
                    <div class="restaurant-details">
                        <h3 class="restaurant-name">{{ $restaurant->name }}</h3>
                        <p>Frais de port: {{ $restaurant->shippingfee }}</p>
                        <p>Temps de livraison: {{ $restaurant->shippingtime }}</p>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
