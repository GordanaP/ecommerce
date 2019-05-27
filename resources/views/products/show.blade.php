@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $product])
        products
    @endadmin_show_header

    <div class="flex">

        <div class="card card-body w-1/2">

            @identifier(['model' => $product])
            @endidentifier

            <hr class="border-t border-grey-lighter">

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
                <p class="text-grey-dark">{{ $product->name }}</p>
            </div>

            <hr class="border-t border-grey-lighter">

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Description</p>

                <div class="flex-col w-1/2">

                    <a data-toggle="collapse" href="#collapseProduct" role="button" aria-expanded="false" aria-controls="collapseProduct" class="underline">
                        Click here
                    </a>

                    <p class="collapse text-grey-dark" id="collapseProduct">
                        {{ $product->description }}
                    </p>
                </div>
            </div>

            <hr class="border-t border-grey-lighter">

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                    Price ({{ config('cart.currency') }})
                </p>
                <p class="text-grey-dark">{{ Price::getFormatted($product->present_price) }}</p>
            </div>

            <hr class="border-t border-grey-lighter">

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Category</p>
                <a href="{{ route('categories.show', $product->category) }}">
                    {{ $product->category->name }}
                </a>
            </div>

            <hr class="border-t border-grey-lighter">

            <div class="flex">
                <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Brand</p>
                <a href="{{ route('brands.show', $product->brand) }}">
                    {{ $product->brand->name }}
                </a>
            </div>

            <hr class="border-t border-grey-lighter">

            @timestamps(['model' => $product])
            @endtimestamps

        </div>

        <div class="card card-body w-1/2 border-none p-0">
            <img src="{{ $product->image->display() }}" alt="" class="w-1/2 mx-auto rounded-sm">
        </div>

    </div>

@endsection