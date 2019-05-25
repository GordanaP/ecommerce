@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'orders'])

        @slot('title')
        @endslot

        {{ route('orders.create') }}

    @enddatatable_header

    @datatable(['items' => 'orders'])

        <th>Identifier</th>
        <th>Amount ({{ config('app.currency') }})</th>
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