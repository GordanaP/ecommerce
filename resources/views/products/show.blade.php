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

            <div class="mx-auto">
                <form action="{{ route('carts.store', $product) }}" method="POST">

                    @csrf

                    <button type="submit" class="btn bg-indigo-light text-white hover:bg-indigo-dark mt-4">
                        <svg class="fill-current text-white h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>

                        <span>Add to cart</span>
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection