@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between">

        <h3>Orders</h3>

        @if (ShoppingCart::isEmpty())
            <a href="{{ route('carts.create') }}" class="btn bg-indigo-light text-white hover:bg-indigo-dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-4 w-4 mr-1" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>
                <span>Add Order</span>
            </a>
        @endif

    </div>

    <hr>

    @datatable(['items' => 'orders'])

        <th>Identifier</th>
        <th>Items #</th>
        <th>Total ({{ config('cart.currency') }})</th>
        <th>Paid</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Orders';

        var itemsIndexUrl = "{{ route('api.orders.index') }}";

        var itemsDatatable = @include('orders.tables._datatable')

        handleDeleteCheckboxes(items)

        deleteSingleRecord(items, itemsDatatable);

        deleteManyRecords(items, itemsDatatable)

    </script>
@endsection