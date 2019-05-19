@extends('admin.layouts.app')

@section('content')

    @admin_save_header(['items' => 'products'])
        Update
    @endadmin_save_header

    <div class="w-1/2" style="margin:auto">
        @include('products.forms._save', [

            'route' => route('products.update', $product),
            'name' => old('name') ?: $product->name,
            'description' => old('description') ?: $product->description,
            'price' => old('price') ?: Price::toFloat($product->present_price),
            'category_id' => old('category_id') ?: $product->category_id,
            'brand_id' => old('brand_id') ?: $product->brand_id,
            'button_back' => 'Update & Update Again',
            'button_redirect' => 'Update & View Product'

        ])
    </div>

@endsection
