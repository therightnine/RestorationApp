<!-- resources/views/checkout/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>

        <!-- Add your checkout form or any other content here -->

        <form action="{{ route('checkout.process') }}" method="post">
            @csrf
            <!-- Add your form fields for customer details, payment, etc. here -->

            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
        </form>
    </div>
@endsection
