<?php
// app\Http\Controllers\CartController.php

use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $dishId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Validate and add item to the cart
        $cartItem = new Cart([
            'user_id' => auth()->id(), // Assuming user is authenticated
            'dish_id' => $dishId,
            'quantity' => $request->input('quantity'),
        ]);

        $cartItem->save();

        return redirect('/cart')->with('success', 'Item added to cart successfully!');
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

    public function viewCart()
    {
        // Display the cart
        $cartItems = Cart::where('user_id', auth()->id())->get();

        return view('cart.view', compact('cartItems'));
    }
}
