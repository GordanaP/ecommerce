@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'categories'])

        {{ route('categories.create') }}

    @enddatatable_header

    @datatable(['items' => 'categories'])

        <th>Title</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var items = 'Categories';

        var itemsIndexUrl = "{{ route('api.categories.index') }}";

        var itemsDatatable = @include('categories.tables._datatable')

        handleDeleteCheckboxes(items)

        deleteSingleRecord(items, itemsDatatable);

        deleteManyRecords(items, itemsDatatable)

    </script>
@endsection