@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'products'])

        @slot('title')
            @if (request()->route('category'))
                Category <span class="text-grey font-bold">{{ $category->name }}</span>
            @elseif (request()->route('brand'))
                Brand <span class="text-grey font-bold">{{ $brand->name }}</span>
            @else
            @endif
        @endslot

        @if (request()->route('category'))
            {{ route('categories.products.create', $category) }}
        @elseif (request()->route('brand'))
            {{ route('brands.products.create', $brand) }}
        @else
            {{ route('products.create') }}
        @endif
    @enddatatable_header

    @datatable(['items' => 'products'])

        <th>Title</th>
        <th>Price ({{ config('app.currency') }})</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var products = 'Products';

        @if (request()->route('category'))
            var productsIndexUrl = "{{ route('api.categories.products.index', $category) }}";
        @elseif (request()->route('brand'))
            var productsIndexUrl = "{{ route('api.brands.products.index', $brand) }}";
        @else
            var productsIndexUrl = "{{ route('api.products.index') }}";
        @endif

        var productsDatatable = @include('products.tables._datatable')

        handleDeleteCheckboxes(products)

        deleteSingleRecord(products, productsDatatable);

        deleteManyRecords(products, productsDatatable)

    </script>
@endsection