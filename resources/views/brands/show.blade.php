@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $brand])
        brands
    @endadmin_show_header

    <div class="card card-body">

        @identifier(['model' => $brand])
        @endidentifier

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
            <p class="text-grey-dark">{{ $brand->name }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        @timestamps(['model' => $brand])
        @endtimestamps

        <hr class="border-t border-grey-lighter">

        @related_products(['model' => $brand])
            brands
        @endrelated_products

    </div>

@endsection