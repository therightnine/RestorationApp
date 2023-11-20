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

    
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@300;500&display=swap" rel="stylesheet">


    <style>
      

        .navbar-brand img {
            max-height: 100px; /* Limit the maximum height of the logo for better appearance */
        }

        .nav-link {
            color: red !important; /* Set text color to white */
            margin: 0 10px; /* Add margin for a more spaced-out look */
        }

        .navbar-brand,
        .navbar-brand:hover,
        .navbar-brand:focus {
            color: black !important; /* Set text color to white for brand */
        }

        .navbar-brand img {
            transition: transform 0.3s ease-in-out; /* Add a smooth transition effect to the logo */
        }

        .navbar-brand:hover img {
            transform: scale(1.1); /* Increase the size of the logo on hover */
        }

        .navbar-brand,
        .nav-link {
            font-weight: bold; /* Make the text bold for emphasis */
        }

        .navbar-brand,
        .nav-link:hover {
            color: red !important; /* Change text color to gold on hover */
        }

        


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
<header class="bg-white">
    <nav class="flex justify-between items-center w-[92%] mx-auto relative">
        <div class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-start justify-start md:gap-[4vw] gap-8 w-full">
            <li>
                    <a class="no-underline text-red-500 hover:text-black" href="#">Home</a>
                </li>
                <li>
                    <a class="text-red-500 hover:text-black no-underline" href="#">Features</a>
                </li>
                <li>
                    <a class="text-red-500 hover:text-black no-underline" href="#">Restaurants</a>
                </li>
                <li>
                    <a class="no-underline text-red-500 hover:text-black" href="#">About Us</a>
                </li>
                
            </ul>
        </div>
        <div class="flex items-center justify-center w-full md:w-auto">
            <!-- Brand/logo centered -->
            <a class="navbar-brand" href="/">
                <img src="assets/logo.png" alt="DishDash Logo" height="150">
            </a>
        </div>
        <div class="flex items-center justify-end">
            <!-- Login Icon -->
            <a class="navbar-brand" href="login"><i class="fas fa-sign-in-alt"></i></a>
            <!-- Shopping Bag Icon -->
            <a class="navbar-brand" href="#"><i class="fas fa-shopping-bag"></i></a>
        </div>
        <div class="flex items-center gap-6 md:hidden">
            <!--<button class="bg-[#ee464c] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Sign in</button> -->
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer"></ion-icon>
        </div>
    </nav>
</header>








    
    





    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>







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

<!-- Footer -->
<footer class="footer bg-gradient-to-t from-[#cf6f6f] to-[#ffffff]  text-red-500">
    <div class="container mx-auto py-8">
        <div class="flex flex-wrap">

            <!-- May We Help You Section -->
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <h3 class="text-lg font-semibold mb-4">May We Help You ?</h3>
                <ul>
                    <li><a href="#" class="hover:text-gray-300">Contact Us</a></li>
                    <li><a href="#" class="hover:text-gray-300">My Order</a></li>
                    <li><a href="#" class="hover:text-gray-300">Shipping and Return</a></li>
                    <li><a href="#" class="hover:text-gray-300">Terms and Conditions</a></li>
                </ul>
            </div>

            <!-- Company Section -->
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <h3 class="text-lg font-semibold mb-4">Company</h3>
                <ul>
                    <li><a href="#" class="hover:text-gray-300">About Us</a></li>
                    <li><a href="#" class="hover:text-gray-300">Privacy & Cookies</a></li>
                    <li><a href="#" class="hover:text-gray-300">Best Sellers</a></li>
                    <li><a href="#" class="hover:text-gray-300">Offers</a></li>
                </ul>
            </div>

            <!-- Boxes Section -->
            <div class="w-full md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Get Updates</h3>
                <div class="mb-3">
                    <input type="text" class="form-input w-full" placeholder="What is your location">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-input w-full" placeholder="Sign up for updates">
                </div>
                <button class="bg-[#eeeeee] text-[#dc3545] py-2 px-4 rounded-full hover:bg-[#dc3545] hover:text-white">Subscribe</button>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-8 text-center">
            <p class="text-sm">&copy; 2023 DishDash</p>
        </div>
    </div>
</footer>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add your custom scripts here if needed -->

</body>
</html>
