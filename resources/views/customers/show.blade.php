@extends('admin.layouts.app')

@section('content')

    @admin_show_header(['parameter' => $customer])
        customers
    @endadmin_show_header

    <div class="card card-body">

        @identifier(['model' => $customer])
        @endidentifier

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">Name</p>
            <p class="text-grey-dark">{{ $customer->full_name }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Street Address
            </p>
            <p class="text-grey-dark">{{ $customer->address }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Postal Code
            </p>
            <p class="text-grey-dark">{{ $customer->postal_code }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                City
            </p>
            <p class="text-grey-dark">{{ $customer->city }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                E-mail address
            </p>
            <p class="text-grey-dark">{{ $customer->email }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        <div class="flex">
            <p class="w-1/5 uppercase text-sm text-grey-darkest font-bold">
                Phone number
            </p>
            <p class="text-grey-dark">{{ $customer->phone }}</p>
        </div>

        <hr class="border-t border-grey-lighter">

        @timestamps(['model' => $customer])
        @endtimestamps

    </div>

@endsection