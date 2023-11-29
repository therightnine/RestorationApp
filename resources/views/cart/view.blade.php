@extends('layouts.navbarfooter')

@section('content')

<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Shopping Cart</h1>

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        {{-- Display Success Message --}}
        @if(session('success'))
            <div class="bg-yellow-200 text-yellow-800 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="col-span-2">
                @foreach($cartItems as $cartItem)
                    <div class="bg-white rounded-lg p-4 shadow-md mb-4 flex items-center">
                        <!-- Dish Image -->
                        <div class="mr-4">
                            <a href="{{ route('dishes.show', ['id' => $cartItem->dish->id]) }}">
                                <img src="{{ asset($cartItem->dish->picture) }}" alt="{{ $cartItem->dish->name }}" style="max-width: 80px;" class="rounded-lg cursor-pointer">
                            </a>
                        </div>

                        <!-- Dish Details -->
                        <div class="flex flex-col">
                            <div class="font-semibold">{{ $cartItem->dish->name }}</div>
                            <div class="text-gray-600">
                                Quantity:
                                <form id="quantity-form-{{ $cartItem->id }}" action="{{ route('cart.update', ['cartId' => $cartItem->id]) }}" method="get" class="flex items-center mt-2">
                                    @csrf
                                    @method('put')
                                    <!-- - Icon -->
                                    <button type="button" onclick="updateQuantity({{ $cartItem->id }}, -1)" class="text-blue-500">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <!-- Quantity Input -->
                                    <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="form-input mx-2 text-center" style="width: 40px;">
                                    <!-- + Icon -->
                                    <button type="button" onclick="updateQuantity({{ $cartItem->id }}, 1)" class="text-blue-500">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <!-- Submit Button (Hidden) -->
                                    <button type="submit" class="hidden"></button>
                                </form>
                            </div>
                            <div class="text-gray-600">Price: {{ $cartItem->dish->price }} TND</div>
                            <div class="text-gray-600">Subtotal: {{ $cartItem->quantity * $cartItem->dish->price }} TND</div>
                        </div>
                        
                        <!-- Remove Button -->
                        <form action="{{ route('cart.remove', ['cartId' => $cartItem->id]) }}" method="post" class="text-sm">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="col-span-1">
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Order Details</h2>
                    <div class="text-gray-600 flex items-center mb-2">
                        <i class="fas fa-shopping-bag text-2xl mr-2"></i>
                        Total Items: {{ $cartItems->sum('quantity') }}
                    </div>
                    <div class="text-gray-600 flex items-center mb-2">
                        <i class="fas fa-money-bill-wave text-2xl mr-2"></i>
                        Total Price: {{ $cartItems->sum(function($item) { return $item->quantity * $item->dish->price; }) }} TND
                    </div>
                    

                    {{-- Display Shipping Time and Fee --}}
                    <div class="text-gray-600 flex items-center mb-2">
                        <i class="fas fa-clock text-2xl mr-2"></i>
                        Shipping Time: {{ $restaurant->shippingtime }} Minutes
                    </div>
                    <div class="text-gray-600 flex items-center mb-4">
                        <i class="fas fa-shipping-fast text-2xl mr-2"></i>
                        Shipping Fee: {{ $restaurant->shippingfee }} TND
                    </div>

                    <!-- Proceed to Pay Button -->
                    <a class="bg-green-500 text-white py-2 px-4 rounded-full text-sm hover:bg-green-600 transition duration-300">
                        <i class="fas fa-credit-card mr-2"></i> Proceed to Pay
                    </a>

                    <!-- Additional order details can be added here -->
                </div>
            </div>
        </div>
    @endif
</div>

<script>
function updateQuantity(cartItemId, change) {
    const form = document.getElementById(`quantity-form-${cartItemId}`);
    const quantityElement = form.querySelector('input[name="quantity"]');
    let newQuantity = parseInt(quantityElement.value) + change;
    newQuantity = Math.max(newQuantity, 1); // Ensure quantity is not less than 1
    quantityElement.value = newQuantity;

    // Submit the form using JavaScript
    form.submit();
}
</script>

@endsection

