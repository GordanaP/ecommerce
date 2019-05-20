@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'customers'])
        Update
    @endadmin_save_header

    <div class="w-1/2" style="margin:auto">
        @include('customers.forms._save', [

            'route' => route('customers.update', $customer),
            'first_name' => old('first_name') ?: $customer->first_name,
            'last_name' => old('last_name') ?: $customer->last_name,
            'address' => old('address') ?: $customer->address,
            'postal_code' => old('postal_code') ?: $customer->postal_code,
            'city' => old('city') ?: $customer->city,
            'email' => old('email') ?: $customer->email,
            'phone' => old('phone') ?: $customer->phone,
            'button_back' => 'Update & Update Again',
            'button_redirect' => 'Update & View Customer'

        ])
    </div>

@endsection
