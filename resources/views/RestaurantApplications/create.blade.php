<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Restaurant Application</title>
    <!-- Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Add your additional stylesheets or CDN links here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add additional styles as needed -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

       

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #e44d26; /* Red */
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        label {
            color: #343a40; /* Dark Gray */
        }

        input[type="text"],
        input[type="file"],
        textarea {
            border: 1px solid #ced4da; /* Light Gray */
            border-radius: 4px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        button[type="submit"] {
            background-color: #28a745; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838; /* Darker Green */
        }

        #map {
            height: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 16px;
        }
    </style>
</head>


<body>
@extends('layouts.navbarfooter')
@section('content')

    <div class="container">
        <h2>Create Restaurant Application</h2>

        <form action="{{ route('restaurant.application.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Add your form fields here -->
            <div class="mb-3">
                <label for="restaurant_id">Restaurant Id</label>
                <input type="text" class="form-control" id="restaurant_id" name="restaurant_id" required>
            </div>

            <div class="mb-3">
                <label for="restaurant_name">Restaurant Name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" required>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="logo">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
            </div>

            <!-- Hidden field to capture user_id from the active session -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- Hidden field to set the status to "pending" by default -->
            <input type="hidden" name="status" value="pending">

            <!-- Location Tapping Field -->
            <div class="mb-3">
                <label for="location">Location</label>
                <div id="map"></div>
                <div class="input-group">
                    <input type="text" class="form-control" id="location" name="location"
                        placeholder="Type location or click on the map" aria-describedby="location-btn">
                    <button class="btn btn-primary" type="button" id="location-btn" onclick="getLocation()">Get My
                        Location</button>
                </div>
            </div>

            <button type="submit">Next</button>

        </form>
    </div>

    <!-- JavaScript to Get Location -->
    <script>
        var map = L.map('map').setView([0, 0], 2); // Default view at coordinates [0, 0] with zoom level 2
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        function getLocation() {
            var locationInput = document.getElementById('location').value;
            if (locationInput) {
                // Try to geocode the location input
                fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(locationInput))
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            var lat = parseFloat(data[0].lat);
                            var lon = parseFloat(data[0].lon);
                            map.setView([lat, lon], 15); // Set the map view to the geocoded location with zoom level 15

                            L.marker([lat, lon]).addTo(map) // Add a marker at the geocoded location
                                .bindPopup("Location: " + locationInput).openPopup();
                        } else {
                            alert("Location not found. Please try again.");
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching geocoding data:', error);
                    });
            } else {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            map.setView([latitude, longitude], 15); // Set the map view to the user's location with zoom level 15

            L.marker([latitude, longitude]).addTo(map) // Add a marker at the user's location
                .bindPopup("Your Location").openPopup();
        }
    </script>
@endsection

</body>

</html>

