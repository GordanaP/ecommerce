@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'categories'])
    @enddatatable_header

    <hr>

    @datatable(['items' => 'categories'])

        <th>Title</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var categories = 'Categories';
        var categoriesDatatable = @include('categories.tables._datatable')

        handleDeleteCheckboxes(categories)

        deleteSingleRecord(categories, categoriesDatatable);

        deleteManyRecords(categories, categoriesDatatable)

    </script>
@endsection