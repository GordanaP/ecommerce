@extends('admin.layouts.app')

@section('content')

    <header class="flex justify-between">
        <h3>Place Order</h3>

        <div class="flex items-center">
            <a href="{{ route('carts.create') }}" class="mr-4">
                Continue shopping
            </a>

            @if (ShoppingCart::isNotEmpty())
                <a href="{{ route('carts.show') }}" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
                    <i class="fa fa-angle-double-right fa-lg mr-1" aria-hidden="true"></i>
                    <span>Update cart</span>
                </a>
            @endif
        </div>
    </header>

    <hr>

    <form action="{{ route('carts.customers.store') }}" method="POST" >

        @csrf

        <div class="flex">
            <div class="w-1/3">
                @include('carts.forms._add_customer', [
                    'first_name' => old('first_name'),
                    'last_name' => old('last_name'),
                    'address' => old('address'),
                    'postal_code' => old('postal_code'),
                    'city' => old('city'),
                    'email' => old('email'),
                    'phone' => old('phone'),
                ])
            </div>

            <div class="w-2/3">
                <div class="w-4/5 float-right">
                    @if (ShoppingCart::isNotEmpty())
                        <table class="table bg-white text-xs">
                            <thead class="bg-grey-dark uppercase text-white">
                                <th width="12%">Item</th>
                                <th width="25%"></th>
                                <th width="20%" class="text-center">Price</th>
                                <th width="20%">Qty</th>
                                <th width="10%" class="text-right">Subtotal</th>
                            </thead>

                            <tbody>
                                <!-- Cart items -->
                                @foreach ($cartItems as $rowId => $item)
                                    @include('orders.tables._cart_item_row')
                                @endforeach

                                <!-- Cart price -->
                                @include('orders.tables._cart_price_row')
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Buttons -->
            <button type="submit" class="btn bg-teal text-white hover:bg-teal-dark pull-right">
                Place Order
                <svg class="fill-current text-white ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 7H2v6h8v5l8-8-8-8v5z"/></svg>
            </button>

    </form>

    <form action="{{ route('carts.empty') }}" method="POST" class="float-right">

        @csrf
        @method('DELETE')

        <button class="btn bg-orange text-white hover:bg-orange-dark">
            <svg class="fill-current text-white h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
            <span>Cancel</span>
        </button>

    </form>

@endsection
