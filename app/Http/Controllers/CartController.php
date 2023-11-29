<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $dishId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Verify if the user is authenticated
        if (auth()->check()) {
            // Retrieve the dish associated with $dishId
            $dish = Dish::findOrFail($dishId);

            // Validate and add the item to the cart
            if ($dish) {
                // Validate and add the item to the cart
                $cartItem = new Cart([
                    'user_id' => auth()->id(),
                    'dish_id' => $dish->id,
                    'quantity' => $request->input('quantity'),
                ]);

                $cartItem->save();

                return redirect()->route('cart.view')->with('success', 'Item added to cart successfully!');
            } else {
                // Handle the case where the dish is not found
                return redirect()->route('cart.view')->with('error', 'Dish not found.');
            }
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }
    }
    
    public function updateCart(Request $request, $cartId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Validate and update cart item quantity
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->update([
            'quantity' => $request->input('quantity'),
        ]);

        return redirect('/cart')->with('success', 'Cart updated successfully!');
    }

    public function removeFromCart($cartId)
    {
        // Remove item from the cart
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();

        return redirect('/cart')->with('success', 'Item removed from cart successfully!');
    }

// CartController.php

public function viewCart()
{
    // Display the cart
    $cartItems = Cart::where('user_id', auth()->id())->get();

    // Calculate total
    $total = $cartItems->sum(function ($cartItem) {
        return $cartItem->dish->price * $cartItem->quantity;
    });

    return view('cart.view', compact('cartItems', 'total'));
}

// CartController.php

public function addToCartDirect(Request $request, $dishId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    // Verify if the user is authenticated
    if (auth()->check()) {
        // Retrieve the dish associated with $dishId
        $dish = Dish::findOrFail($dishId);

        // Validate and add the item to the cart
        if ($dish) {
            // Validate and add the item to the cart
            $cartItem = new Cart([
                'user_id' => auth()->id(),
                'dish_id' => $dish->id,
                'quantity' => $request->input('quantity'),
            ]);

            $cartItem->save();

            return redirect()->back()->with('success', 'Item added to cart successfully!');
        } else {
            // Handle the case where the dish is not found
            return redirect()->back()->with('error', 'Dish not found.');
        }
    } else {
        // Handle the case where the user is not authenticated
        return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
    }
}


}
