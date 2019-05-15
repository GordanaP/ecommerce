@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'products'])
    @enddatatable_header

    @datatable(['items' => 'products'])

        <th>Title</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var products = 'Products';
        var productsDatatable = @include('products.tables._datatable')

        handleDeleteCheckboxes(products)

        deleteSingleRecord(products, productsDatatable);

        deleteManyRecords(products, productsDatatable)

    </script>
@endsection