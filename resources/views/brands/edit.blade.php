@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'brands'])
        Update
    @endadmin_save_header

    <div class="w-1/2" style="margin:auto">
        @include('brands.forms._save', [

            'route' => route('brands.update', $brand),
            'name' => old('name') ?: $brand->name,
            'button_back' => 'Update & Update Again',
            'button_redirect' => 'Update & View Brand'

        ])
    </div>

@endsection
