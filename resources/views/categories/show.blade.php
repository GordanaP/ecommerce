@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $category])
        categories
    @endadmin_show_header

    <div class="card card-body">

        @identifier(['model' => $category])
        @endidentifier

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
            <p class="text-grey-dark">{{ $category->name }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        @timestamps(['model' => $category])
        @endtimestamps

        <hr class="border-t border-grey-lighter">

        @related_products(['model' => $category])
            categories
        @endrelated_products

    </div>

@endsection