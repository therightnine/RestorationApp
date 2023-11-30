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
        // Inside your controller method that handles the quantity update
        return redirect('/cart')->with('success', 'Quantity updated successfully!');

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
        // Fetch the cart items and load the related dish and restaurant information
        $cartItems = Cart::where('user_id', auth()->id())->with(['dish.menu.restaurant'])->get();
    
        // Calculate total items and total price
        $totalItems = $cartItems->sum('quantity');
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->dish->price;
        });
    
        // Assuming the restaurant is the same for all items in the cart
        // You can change this if your business logic is different
        $restaurant = $cartItems->first()->dish->menu->restaurant;
    
        return view('cart.view', compact('cartItems', 'totalItems', 'totalPrice', 'restaurant'));
    }

}
