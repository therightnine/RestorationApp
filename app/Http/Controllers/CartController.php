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

    // Vérifier si l'utilisateur est authentifié
    if (auth()->check()) {
        // Récupérer le plat associé au $dishId
        $dish = Dish::findOrFail($dishId);

        // Valider et ajouter l'élément au panier
        // ...
if ($dish) {
    // Valider et ajouter l'élément au panier
    $cartItem = new Cart([
        'user_id' => auth()->id(),
        'dish_id' => $dish->id,
        'quantity' => $request->input('quantity'),
    ]);

    $cartItem->save();

    return redirect()->route('cart.view')->with('success', 'Item added to cart successfully!');
} else {
    // Gérer le cas où le plat n'est pas trouvé
    return redirect()->route('cart.view')->with('error', 'Dish not found.');
}
    }}
    
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
