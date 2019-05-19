@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $brand])
        brands
    @endadmin_show_header

    <div class="card card-body">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Id</p>
            <p class="text-grey-dark">{{ $brand->id }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
            <p class="text-grey-dark">{{ $brand->name }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Created</p>
            <p class="text-grey-dark">{{ $brand->creation_date }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Last change</p>
            <p class="text-grey-dark">{{ $brand->last_change_date }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Products</p>
            <p class="text-grey-dark">
                <span class="mr-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-light mr-1" width="4%" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"/></svg>

                    <a href="{{ route('brands.products.index', $brand) }}">View products</a>
                </span>

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-light mr-1" width="4%" viewBox="0 0 20 20"><path d="M11 9V5H9v4H5v2h4v4h2v-4h4V9h-4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"/></svg>

                    <a href="{{ route('brands.products.create', $brand) }}">Add a product</a>
                </span>
            </p>
        </div>

    </div>

@endsection