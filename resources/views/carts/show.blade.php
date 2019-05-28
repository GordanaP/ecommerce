@extends('admin.layouts.app')

@section('content')

    <header class="flex justify-between">
        <h3>View Cart</h3>

        <div class="flex items-center">
            <a href="{{ route('carts.create') }}" class="mr-2">
                Continue shopping
            </a>

            @if (ShoppingCart::isNotEmpty())
                <div class="flex">
                    <form action="{{ route('carts.empty') }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn bg-orange text-white hover:bg-orange-dark">
                            <svg class="fill-current text-white h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
                            <span>Empty Cart</span>
                        </button>
                    </form>

                    <a href="{{ route('orders.create') }}" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
                        <i class="fa fa-angle-double-right fa-lg mr-1" aria-hidden="true"></i>
                        <span>Checkout</span>
                    </a>
                </div>
            @endif
        </div>
    </header>

    <hr>

    @if (ShoppingCart::isNotEmpty())
        <table class="table bg-white border-b border-grey-light">
            <thead class="bg-grey-dark uppercase text-white">
                <th width="12%">Item</th>
                <th width="25%"></th>
                <th width="20%" class="text-center">Price</th>
                <th width="10%">Qty</th>
                <th width="15%" class="text-right">Subtotal</th>
                <th></th>
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
