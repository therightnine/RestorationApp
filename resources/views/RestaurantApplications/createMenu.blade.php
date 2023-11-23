<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu Application</title>

    <!-- Add Bootstrap CSS (you can replace this with a CDN link if needed) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- resources/views/MenuApplications/create.blade.php -->

    <div class="container">
        <h2>Create Menu Application</h2>

        <form action="{{ route('menu.application.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Hidden field for restaurant_id -->
            <input type="hidden" name="restaurant_id" value="{{ $restaurantApplication->id }}">

            <!-- Hidden field for menu_id -->
            <input type="hidden" name="menu_id" value="{{ uniqid() }}">

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Fields for dishes -->
            <div class="mb-3">
                <label for="dishes" class="form-label">Dishes</label>
                <div id="dishes">
                    <div class="dish">
                        <input type="text" class="form-control mb-2" name="dishes[0][name]" placeholder="Dish Name" required>
                        <input type="file" class="form-control-file mb-2" name="dishes[0][photo]">
                        <textarea class="form-control mb-2" name="dishes[0][description]" placeholder="Dish Description" required></textarea>
                        <input type="number" class="form-control" name="dishes[0][price]" placeholder="Price" required>
                    </div>
                    <!-- Add more fields dynamically using JavaScript -->
                </div>
                <button type="button" class="btn btn-secondary mt-2" id="addDish">Add Dish</button>
            </div>
            
            <!-- Add a link/button to go back to the restaurant application -->
            <div class="text-center mt-3">
                <a href="{{ route('restaurant.application.create') }}" class="btn btn-success">Back</a>
            </div>
            @if(isset($restaurantApplication) && $restaurantApplication->id > 0)
                <button type="submit" class="btn btn-primary">Submit </button>
            @endif

        </form>
    </div>

    <script>
        // JavaScript to add dynamic fields for dishes
        let dishCounter = 1;
        document.getElementById('addDish').addEventListener('click', function () {
            const dishesDiv = document.getElementById('dishes');
            const newDish = document.createElement('div');
            newDish.classList.add('dish');
            newDish.innerHTML = `
                <input type="text" class="form-control mb-2" name="dishes[${dishCounter}][name]" placeholder="Dish Name" required>
                <input type="file" class="form-control-file mb-2" name="dishes[${dishCounter}][photo]">
                <textarea class="form-control mb-2" name="dishes[${dishCounter}][description]" placeholder="Dish Description" required></textarea>
                <input type="number" class="form-control" name="dishes[${dishCounter}][price]" placeholder="Price" required>
            `;
            dishesDiv.appendChild(newDish);
            dishCounter++;
        });
    </script>

</body>

</html>
