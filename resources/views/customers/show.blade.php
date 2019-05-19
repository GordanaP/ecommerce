@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $product])
        products
    @endadmin_show_header

    <div class="card card-body">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Id</p>
            <p class="text-grey-dark">{{ $product->id }}</p>
        </div>

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
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </p>
            </div>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Price ({{ config('app.currency') }})
            </p>
            <p class="text-grey-dark">{{ Price::toFloat($product->present_price) }}</p>
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

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Image</p>
            <img src="{{ $product->image->display() }}" alt="" style="width: 50px; height: 50px">
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Created</p>
            <p class="text-grey-dark">{{ $product->creation_date }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Last change</p>
            <p class="text-grey-dark">{{ $product->last_change_date }}</p>
        </div>

    </div>

@endsection