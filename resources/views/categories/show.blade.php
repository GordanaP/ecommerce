@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $category])
        categories
    @endadmin_show_header

    <div class="card card-body">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Id</p>
            <p class="text-grey-dark">{{ $category->id }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
            <p class="text-grey-dark">{{ $category->name }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Created</p>
            <p class="text-grey-dark">{{ $category->creation_date }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Last change</p>
            <p class="text-grey-dark">{{ $category->last_change_date }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Products</p>
            <p class="text-grey-dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-light mr-1" width="8%" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"/></svg>

                <a href="#">View</a>
            </p>
        </div>

    </div>

@endsection