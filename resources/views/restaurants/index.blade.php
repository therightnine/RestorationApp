<!-- resources/views/restaurants/index.blade.php -->
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
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .restaurant-list {
            list-style: none;
            padding: 0;
        }

        .restaurant-item {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .restaurant-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
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
                <a href="/restaurants/{{ $restaurant->id }}" class="restaurant-link">{{ $restaurant->name }}</a>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
