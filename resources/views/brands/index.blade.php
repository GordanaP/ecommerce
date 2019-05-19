@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'brands'])

        {{ route('brands.create') }}

    @enddatatable_header

    @datatable(['items' => 'brands'])

        <th>Title</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Brands';

        var itemsIndexUrl = "{{ route('api.brands.index') }}";

        var itemsDatatable = @include('brands.tables._datatable')

        handleDeleteCheckboxes(items)

        deleteSingleRecord(items, itemsDatatable);

        deleteManyRecords(items, itemsDatatable)

    </script>
@endsection