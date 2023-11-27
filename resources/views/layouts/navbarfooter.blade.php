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
                    <a class="text-red-500 hover:text-black no-underline" href="{{route('restaurants.all')}}">Restaurants</a>
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
    <div>
        @yield('content')
    </div>
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
