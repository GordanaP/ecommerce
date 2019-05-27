@extends('admin.layouts.app')

@section('content')

    <header class="flex justify-between">
        <h3>View Cart</h3>
        <div>
            <a href="{{ route('customers.carts.create', $customer) }}" class="mr-4">
                Continue shopping
            </a>

            <a href="#" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
                <svg class="fill-current text-white inline-block h-4 w-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                <span>Checkout</span>
            </a>
        </div>
    </header>
    <hr>

    @if (ShoppingCart::isNotEmpty(config('cart.name')))
        <table class="table bg-white border-b border-grey-light">
            <thead class="bg-grey-dark uppercase text-white">
                <th width="10%">Item</th>
                <th width="23%"></th>
                <th width="20%" class="text-center">Price</th>
                <th width="12%">Qty</th>
                <th width="13%" class="text-right">Subtotal</th>
                <th width="12%" class="text-center"><i class="fa fa-cog"></i></th>
            </thead>

            <tbody>

                <!-- Cart items -->
                @foreach ($cartItems as $rowId => $item)
                    @include('carts.tables._cart_item_row')
                @endforeach

                <!-- Cart price -->
                @include('carts.tables._cart_price_row')

            </tbody>
        </table>
    @else
        The cart is empty.
    @endif

@endsection
