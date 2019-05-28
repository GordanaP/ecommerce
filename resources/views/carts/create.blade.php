@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between">

        <h3>Add a product to the cart</h3>

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

                <a href="{{ route('carts.show') }}" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
                    <svg class="fill-current text-white h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                    <span>View Cart</span>
                </a>
            </div>
        @endif

    </div>

    <hr>
    @php
        $product = App\Product::find(12);
    @endphp

    @datatable(['items' => 'products'])

        <th>Title</th>
        <th>Price ({{ config('cart.currency') }})</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Products';

        var itemsIndexUrl = "{{ route('api.products.index') }}";

        @include('carts.tables._datatable_all_products')

        $(document).on('click', '#addToCart', function() {

            var productId = $(this).val();
            var addToCartUrl = '/customer-cart/'+productId

            addToCart(addToCartUrl)

        });

    </script>
@endsection