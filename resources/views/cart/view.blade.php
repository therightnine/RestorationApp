<!-- resources/views/cart/view.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shopping Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Dish</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cartItems ?? [] as $cartItem)
                    <tr>
                        <td>{{ $cartItem->dish->name }}</td>
                        <td>${{ $cartItem->dish->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', ['cartId' => $cartItem->id]) }}" method="post">
                                @csrf
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>${{ $cartItem->dish->price * $cartItem->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.remove', ['cartId' => $cartItem->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No items in the cart</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <p>Total: ${{ $total }}</p>

        <form action="{{ route('checkout') }}" method="get">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    </div>
@endsection
