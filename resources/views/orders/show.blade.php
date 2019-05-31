@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $order])
        orders
    @endadmin_show_header

    <div class="mb-4">
        <p>Order No: <span class="font-bold">{{ $order->number }}</span></p>
        <p>Date: <span class="font-bold">{{ $order->creation_date }}</span></p>
        <p>Status: <span class="font-bold">{{ $order->status }}</span></p>
    </div>

    <div class="flex">
        <div class="w-1/3">
            <div class="mb-4 w-3/4 p-2 border border-grey-light">
                <p class="underline text-sm text-grey-darker mb-1">Billing Address</p>
                <span class="text-grey-dark text-sm">
                    <a href="{{ route('customers.show', $order->customer) }}">
                        {{ $order->customer->full_name }}
                    </a>
                    <p>{{ $order->customer->address }}</p>
                    <p>{{ $order->customer->postal_code }} {{ $order->customer->city }}</p>
                    <p>{{ $order->customer->email }}</p>
                    <p>{{ $order->customer->phone }}</p>
                </span>
            </div>

            <div class="w-3/4 p-2 border border-grey-light">
                <p class="underline text-sm text-grey-darker mb-1">Shipping Address</p>
                <span class="text-grey-dark text-sm">
                    <a href="{{ route('customers.show', $order->customer) }}">
                        {{ $order->customer->full_name }}
                    </a>
                    <p>{{ $order->customer->address }}</p>
                    <p>{{ $order->customer->postal_code }} {{ $order->customer->city }}</p>
                    <p>{{ $order->customer->email }}</p>
                    <p>{{ $order->customer->phone }}</p>
                </span>
            </div>
        </div>

        <div class="w-2/3">
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
                    @foreach ($order->products as $item)
                        <tr>
                            <!-- Image -->
                            <td class="border-b border-grey-light">
                                <img src="{{ $item->image->display() }}" alt="{{ $item->name }}"
                                class="w-1/2 rounded-sm">
                            </td>

                            <!-- Sku, Name & Description -->
                            <td class="border-b border-grey-light">
                                <p class="mb-2 text-muted text-xs">
                                    SKU
                                </p>

                                <p class="mb-1 font-semibold">
                                    <a href="{{ route('products.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </p>
                                <p class="text-xs mb-0 text-muted">
                                    {{ $item->description }}
                                </p>
                            </td>

                            <!-- Price -->
                            <td class="border-b border-grey-light text-center">
                                {{ Price::present($item->incart->price) }}
                            </td>

                            <!-- Qty -->
                            <td class="border-b border-grey-light">
                                {{ $item->incart->quantity }}
                            </td>

                            <!-- Item subtotal -->
                            <td class="border-b border-grey-light text-right" width="15%">
                                {{ $orderSummary->presentItemSubtotal($item) }}
                            </td>
                        </tr>
                    @endforeach

                    <!-- Cart price -->
                    <tr>
                        <td colspan="4" class="text-right">
                            <p class="font-bold mb-2">Subtotal:</p>
                            <p class="mb-2">Shipping & Handling:</p>
                            <p class="mb-2">Tax ({{ $orderSummary->presentTaxRate() }}):</p>
                        </td>

                        <td class="text-right">
                            <p class="font-bold mb-2">
                                {{ $orderSummary->presentSubtotal() }}
                            </p>
                            <p class="mb-2">
                                $10.00
                            </p>
                            <p class="mb-2">
                                {{ $orderSummary->presentTaxAmount() }}
                            </p>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="4" class="text-right" style="border-top-color:#718096">
                            <p class="mb-0 uppercase font-bold">Grand Total:</p>
                        </td>

                        <td class="text-right"  style="border-top-color: #718096">
                            <p class="font-bold mb-1">
                                {{ $orderSummary->presentTotal() }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection