@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'customers'])

        @slot('title')
        @endslot

        {{ route('customers.create') }}

    @enddatatable_header

    @datatable(['items' => 'customers'])

        <th>Name</th>
        <th>Email</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Customers';

        var itemsIndexUrl = "{{ route('api.customers.index') }}";

        var itemsDatatable = @include('customers.tables._datatable')

        handleDeleteCheckboxes(items)

        deleteSingleRecord(items, itemsDatatable);

        deleteManyRecords(items, itemsDatatable)

    </script>
@endsection