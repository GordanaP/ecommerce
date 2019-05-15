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
            <p class="text-grey-dark">{{ $product->description }}</p>
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