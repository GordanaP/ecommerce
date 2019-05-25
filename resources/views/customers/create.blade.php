@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'customers'])
        Add
    @endadmin_save_header

    <div class="w-1/2 mx-auto">
        @include('customers.forms._save', [

            'route' => route('customers.store'),
            'first_name' => old('first_name'),
            'last_name' => old('last_name'),
            'address' => old('address'),
            'postal_code' => old('postal_code'),
            'city' => old('city'),
            'email' => old('email'),
            'phone' => old('phone'),
            'button_back' => 'Create & Add Another Customer',
            'button_redirect' => 'Create & View Customer'

        ])
    </div>

@endsection
