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
        <th>Price ({{ config('cart.currency') }})</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Products';

        @if (request()->route('category'))
            var itemsIndexUrl = "{{ route('api.categories.products.index', $category) }}";
        @elseif (request()->route('brand'))
            var itemsIndexUrl = "{{ route('api.brands.products.index', $brand) }}";
        @else
            var itemsIndexUrl = "{{ route('api.products.index') }}";
        @endif

        var itemsDatatable = @include('products.tables._datatable')

        handleDeleteCheckboxes(items)

        deleteSingleRecord(items, itemsDatatable);

        deleteManyRecords(items, itemsDatatable)

    </script>
@endsection