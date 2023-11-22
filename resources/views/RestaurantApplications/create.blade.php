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
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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

    <div class="container">
        <h2>Create Restaurant Application</h2>

        <form action="{{ route('applications.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Add your form fields here -->
            <div class="mb-3">
                <label for="restaurant_name" class="form-label">Restaurant Name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
            </div>

            <!-- Hidden field to capture user_id from the active session -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- Hidden field to set the status to "pending" by default -->
            <input type="hidden" name="status" value="pending">

<!-- Location Tapping Field -->
<div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <div id="map" style="height: 300px;"></div>
                <div class="input-group">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Type location or click on the map" aria-describedby="location-btn">
                    <button class="btn btn-primary" type="button" id="location-btn" onclick="getLocation()">Get My Location</button>
                </div>
            </div>

            <!-- Add a link/button to go to the menu submission page -->
            <div class="text-center mt-3">
                <a href="{{ route('applications.create') }}" class="btn btn-success">Back</a>
                <!-- Check if $application exists and has an id before accessing its id -->
                @if(isset($application) && $application->id)
                    <a href="{{ route('menu.create', ['restaurant_id' => $application->id]) }}" class="btn btn-success">Next</a>
                @endif
            </div>



            
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

</body>
</html>