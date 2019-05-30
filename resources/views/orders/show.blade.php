@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $order])
        orders
    @endadmin_show_header

    <div class="card card-body">

        @identifier(['model' => $order])
        @endidentifier

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Identifier</p>
            <p class="text-grey-dark">{{ $order->present_number }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Subtotal ({{ config('cart.currency') }})
            </p>
            <p class="text-grey-dark">{{ Price::toUnit($order->subtotal) }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Tax ({{ config('cart.currency') }})
            </p>
            <p class="text-grey-dark">{{ Price::toUnit($order->tax_amount) }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Subtotal ({{ config('cart.currency') }})
            </p>
            <p class="text-grey-dark">{{ Price::toUnit($order->total) }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Customer</p>
            <p class="text-grey-dark">
                <a href="{{ route('customers.show', $order->customer) }}">
                    {{ $order->customer->full_name }}
                </a>
            </p>
        </div>

        <hr class="border-t border-grey-lighter">

        @timestamps(['model' => $order])
        @endtimestamps

        <hr class="border-t border-grey-lighter">

        @related_products(['model' => $order])
            orders
        @endrelated_products

    </div>

@endsection