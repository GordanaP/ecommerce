@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between">

        <h3>Add to cart</h3>

        <a href="#" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
            <svg class="fill-current text-white inline-block h-4 w-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg> <span>View Cart</span>
        </a>

    </div>

    <hr>

    {{ Session::get('laracommerce') }}

    @datatable(['items' => 'products'])

        <th>Title</th>
        <th>Price ({{ config('app.currency') }})</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Products';

        var itemsIndexUrl = "{{ route('api.products.index') }}";

        @include('carts.tables.datatable_products')

        $(document).on('click', '#addToCart', function() {
            var productId = $(this).val();
            var addToCartUrl = '/my-cart/'+productId

            $.ajax({
                url: addToCartUrl,
                type: 'POST',
                success: function(response) {
                    Swal.fire({
                      title: response.message,
                      text: "What would you like to do next?",
                      type: 'success',
                      showCancelButton: true,
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'Checkout',
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Continue shopping',
                      reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            window.location.reload(true);
                        } else {
                            location.href = '/orders'
                        }
                    });
                }
            });
        });


    </script>
@endsection