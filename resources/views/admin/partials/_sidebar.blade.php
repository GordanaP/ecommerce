<aside class="bg-grey-lighter p-4 h-screen" style="width: 15%;">
    <div class="w-4/5">
        <ul class="pl-0">

            @admin_side_link(['items' => 'categories'])
            @endadmin_side_link

            @admin_side_link(['items' => 'brands'])
            @endadmin_side_link

            @admin_side_link(['items' => 'products'])
            @endadmin_side_link

            @admin_side_link(['items' => 'customers'])
            @endadmin_side_link

            @admin_side_link(['items' => 'orders'])
            @endadmin_side_link

            @if (ShoppingCart::isEmpty(config('cart.name')))
                <li class="d-flex justify-content-between align-items-center p-1">
                    <a href="{{ route('carts.create') }}">
                        New Order
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>