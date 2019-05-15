@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'products'])
        Add
    @endadmin_save_header

    <div class="w-1/2" style="margin:auto">
        @include('products.forms._save', [

            'route' => route('products.store'),
            'name' => old('name'),
            'description' => old('description'),
            'category_id' => old('category_id'),
            'brand_id' => old('brand_id'),
            'button_back' => 'Create & Add Another Product',
            'button_redirect' => 'Create & View Product'

        ])
    </div>

@endsection
