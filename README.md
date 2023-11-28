# RestorationApp
 Project SCRUM 
 File location : c:/xampp/htdocs 


## 11/28/2023 @Ayoub_Chaieb

**Documentation - First Commit: "Added Routes and Functions for Cart Management"**

1. **Overview:**
   - Implemented necessary routes and functions to manage the shopping cart efficiently.
   - Introduced actions for viewing, adding, updating, and removing items from the cart.

2. **Steps:**

   - **Routes Configuration:**
     - Open `routes/web.php`.
     - Added routes dedicated to cart actions.
       ```php
       // routes/web.php

       // View Cart
       Route::get('/cart', 'CartController@viewCart');

       // Add to Cart
       Route::post('/cart/add/{dishId}', 'CartController@addToCart');

       // Update Cart
       Route::put('/cart/update/{cartId}', 'CartController@updateCart');

       // Remove from Cart
       Route::delete('/cart/remove/{cartId}', 'CartController@removeFromCart');
       ```

   - **Controller Functions:**
     - Open `app/Http/Controllers/CartController.php`.
     - Implemented functions to handle cart operations.
       ```php
       // app/Http/Controllers/CartController.php

       public function viewCart()
       {
           // Display the cart
           // ... (implementation details)
       }

       public function addToCart(Request $request, $dishId)
       {
           // Add item to the cart
           // ... (implementation details)
       }

       public function updateCart(Request $request, $cartId)
       {
           // Update cart item quantity
           // ... (implementation details)
       }

       public function removeFromCart($cartId)
       {
           // Remove item from the cart
           // ... (implementation details)
       }
       ```

3. **Usage:**
   - Visit `/cart` to view the current cart items.
   - Utilize the provided routes with the appropriate HTTP methods for seamless cart management.




**Documentation - Second Commit: "Implement Database Seeding for Application Testing"**

1. **Overview:**
   - Implemented comprehensive database seeding for robust application testing.
   - Introduced seeders and factories for Cart, Dish, DishApplication, Menu, MenuApplication, Rating, Restaurant, and User models.

2. **Steps:**
   - Created seeders for various models using Artisan commands.
     ```bash
     php artisan make:seeder CartSeeder
     php artisan make:seeder DishSeeder
     # ... repeat for other models
     ```
   - Updated seeders with model factories to generate realistic data.
   - Resolved foreign key constraints and seeding issues in migrations.

3. **Usage:**
   - Use Artisan commands for database seeding.
     ```bash
     php artisan db:seed --class=CartSeeder
     php artisan db:seed --class=DishSeeder
     # ... repeat for other seeders
     ```

4. **Enhancements:**
   - Implemented DishSeeder with DishApplication factory for specialized dish-related data.
   - Addressed BadMethodCallException in DishApplicationSeeder.
   - Improved CartController with validation and CRUD operations.

5. **Result:**
   - A robust and diverse test environment with realistic data scenarios.
   - Developers can confidently use the application for testing, ensuring reliability.

---
