<!-- resources/views/cart/view.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <ul>
            @foreach($cartItems as $cartItem)
                <li>
                    {{ $cartItem->dish->name }} -
                    Quantity: {{ $cartItem->quantity }}

                    <!-- Update Form -->
                    <form action="{{ url('/cart/update', $cartItem->id) }}" method="post">
                        @csrf
                        @method('put')
                        <label for="quantity">Update Quantity:</label>
                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                        <button type="submit">Update</button>
                    </form>

                    <!-- Remove Button -->
                    <form action="{{ url('/cart/remove', $cartItem->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Add Item Form -->
    <form action="{{ url('/cart/add', $dishId) }}" method="post">
        @csrf
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
@endsection
