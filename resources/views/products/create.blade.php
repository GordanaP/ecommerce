@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'products'])
        Add
    @endadmin_save_header

    <div class="w-1/2" style="margin:auto">
        @include('products.forms._save', [

            'route' => request()->route('category')
                ? route('categories.products.store', $category)
                : request()->route('brand') ? route('brands.products.store', $brand)
                : route('products.store'),
            'name' => old('name'),
            'description' => old('description'),
            'price' => old('price'),
            'category_id' =>
                request()->route('category')
                ? (old('category_id') ?: $category->id)
                : old('category_id'),
            'brand_id' =>
                request()->route('brand')
                ? (old('brand_id') ?: $brand->id)
                : old('brand_id'),
            'button_back' => 'Create & Add Another Product',
            'button_redirect' => 'Create & View Product'

        ])
    </div>

@endsection
