<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional: Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@300;500&display=swap" rel="stylesheet">

    <style>
        /* Your existing styles */

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

        #about-us {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        #about-us h2 {
            color: #dc3545;
            text-align: center;
            margin-bottom: 30px;
        }

        #about-us p {
            text-align: center;
            color: #6c757d;
        }

        #about-us img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .about-us-content {
            display: flex;
            justify-content: space-between;
        }

        .about-us-content > div {
            width: 30%;
        }
    </style>
</head>
<body>
<header class="bg-white">
        <nav class="flex justify-between items-center w-[92%] mx-auto relative">
            <div class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-start justify-start md:gap-[4vw] gap-8 w-full">
                <li>
                        <a class="no-underline text-red-500 hover:text-black" href="{{ route('welcome')}}">Home</a>
                    </li>
                    <li>
                        <a class="text-red-500 hover:text-black no-underline" href="#">Features</a>
                    </li>
                    <li>
                        <a class="text-red-500 hover:text-black no-underline" href="#">Restaurants</a>
                    </li>
                    <li>
                        <a class="no-underline text-red-500 hover:text-black" href="{{ route('aboutUs') }}">About Us</a>
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

    {{-- Content --}}
    <h1 style="text-align: center; color: #8B0000; font-weight: bold;">Welcome to Dish Dash</h1>

    <section id="about-us">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-us-content">
                <div>
                    <img src="https://www.realsimple.com/thmb/9mjAhtVjmyUMm8cnZ6gHjdN-PQ4=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/real-simple-make-you-rown-pizza-RS1222-d5c99b1bfef245938f9241569c2cecbb.jpg" alt="DishDash Restaurant">
                    <p>
                        At DishDash, we take pride in offering a dining experience that goes beyond the ordinary. Our journey began with a simple passion for bringing people together through the joy of delicious food. Today, we stand as a testament to culinary excellence and warm hospitality.
                    </p>
                </div>
                <div>
                    <img src="https://slicelife.imgix.net/609/photos/original/GardenPizza-Philadelphia-PA-PepperoniPizza-01.jpg?auto=compress&auto=format" alt="Chef Cooking">
                    <p>
                        Our chefs meticulously craft each dish, sourcing the finest ingredients to create a symphony of flavors that tantalize the taste buds. Whether you're a food enthusiast or someone looking for a memorable dining experience, DishDash is the place where exceptional cuisine meets a welcoming ambiance.
                    </p>
                </div>
                <div>
                    <img src="https://www.southernliving.com/thmb/3x3cJaiOvQ8-3YxtMQX0vvh1hQw=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/2652401_QFSSL_SupremePizza_00072-d910a935ba7d448e8c7545a963ed7101.jpg" alt="Shared Dining">
                    <p>
                        We believe in the power of shared moments around the table. From our kitchen to your plate, every dish tells a story of dedication and creativity. Join us on a culinary journey that celebrates the art of cooking and the joy of savoring every bite.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- Content --}}

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

</body>
</html>