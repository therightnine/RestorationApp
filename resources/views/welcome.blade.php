<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dish Dash App</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional: Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

  


    <style>
        #about-us {
            background-color: #f8f9fa; /* Light gray background */
            padding: 50px 0; /* Add padding for spacing */
        }

        #about-us h2 {
            color: #dc3545; /* Red text color */
            text-align: center;
            margin-bottom: 30px; /* Add margin for spacing */
        }

        #about-us p {
            text-align: center;
            color: #6c757d; /* Gray text color */
        }

        #about-us img {
            max-width: 100%;
            height: auto;
            border-radius: 300px; /* Add border radius for image */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Add subtle shadow for depth */
        }

        #slider {
            margin-top: 20px;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .carousel-caption h2,
        .carousel-caption p {
            color: white;
        }
    </style>
</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#ffffff] to-[#ffffff] h-screen">


@extends('layouts.navbarfooter')

@section('content')




<!-- Slider Section -->
<div id="slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- Add your slider content, e.g., images and text -->
            <img src="assets/delivery.jpg" class="d-block w-100" alt="Slider Image 1">
            <div class="carousel-caption d-none d-md-block black">
                <h2>Welcome to DISHDASH</h2>
                <p>Discover a variety of restaurants and explore their menus.</p>
                <a href="#" class="btn btn-danger">Explore Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/delivery2.jpg" class="d-block w-100" alt="Slider Image 2">
            
        </div> 
        <div class="carousel-item">
            <img src="assets/delivery3.jpg" class="d-block w-100" alt="Slider Image 2">
            
        </div> 
        <!-- Add more carousel items as needed -->
    </div>

    <!-- Add navigation controls -->
    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- Trending Restaurants Section -->
<section id="trending-restaurants" class="container mt-4">
    <h2 class="text-center mb-4">Trending Restaurants</h2>

    <!-- Carousel -->
    <div id="restaurant-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- Restaurant 1-4 -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-3">
                        <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                        <h4 class="text-center">Restaurant 1</h4>
                    </div>
                    <!-- Add similar columns for Restaurant 2-4 -->
                    <div class="col-md-3">
                        <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                        <h4 class="text-center">Restaurant 2</h4>
                    </div>
                    <div class="col-md-3">
                        <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                        <h4 class="text-center">Restaurant 3</h4>
                    </div>
                    <div class="col-md-3">
                        <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                        <h4 class="text-center">Restaurant 4</h4>
                    </div>
                </div>
            </div>

            <!-- Restaurant 5-8 -->
            <div class="carousel-item">
                <div class="row">
                        <div class="col-md-3">
                            <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                            <h4 class="text-center">Restaurant 5</h4>
                        </div>
                        <!-- Add similar columns for Restaurant 2-4 -->
                        <div class="col-md-3">
                            <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                            <h4 class="text-center">Restaurant 6</h4>
                        </div>
                        <div class="col-md-3">
                            <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                            <h4 class="text-center">Restaurant 7</h4>
                        </div>
                        <div class="col-md-3">
                            <img src="assets/chicken.jpeg" class="img-fluid" alt="Restaurant 1">
                            <h4 class="text-center">Restaurant 8</h4>
                        </div>
                </div>
            </div>

        </div>

        <!-- Navigation controls -->
        <a class="carousel-control-prev" href="#restaurant-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#restaurant-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!-- About Us Section -->
<section id="about-us" class="container mt-4">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <img src="assets/sandwich.jpeg" class="img-fluid" alt="About Us Image">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h2>OUR STORY</h2>
                <p>
                    "In the heart of gastronomic exploration, DishDash emerged as a culinary companion, weaving a tale of flavors from diverse kitchens. Our app is more than a platform; it's an invitation to savor handpicked delights from top-notch restaurants. Join us on a journey where every dish tells a story and every order is a chapter in your own culinary adventure. DishDash – Your gateway to extraordinary tastes, delivered with love."
                </p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 order-md-2 d-flex align-items-center">
            <img src="assets/sandwich.jpeg" class="img-fluid" alt="About Us Image">
        </div>
        <div class="col-md-6 order-md-1 d-flex align-items-center">
            <div>
                <h2>OUR RESTAURANTS</h2>
                <p>
                    "Our curated collection of restaurants presents a fusion of culinary delights, offering a diverse menu that combines timeless classics with innovative dishes. Whether you're drawn to the irresistible allure of traditional favorites or enticed by the unique flavors of our signature dishes, each dining experience is a journey through a world of culinary excellence. From the comforting warmth of familiar flavors to the exciting adventure of new tastes, every meal in our app is an opportunity to savor unforgettable moments."
                </p>
            </div>
        </div>
    </div>
</section>

@endsection

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.tailwindcss.com"></script>
<!-- Add your custom scripts here if needed -->

</body>
</html>
