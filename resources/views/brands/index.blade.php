@extends('admin.layouts.app')

@section('content')

    @datatable_header(['items' => 'brands'])
    @enddatatable_header

    <hr>

    @datatable(['items' => 'brands'])

        <th>Title</th>

    @enddatatable

@endsection

@section('scripts')
    <script>

        var brands = 'Brands';
        var brandsDatatable = @include('brands.tables._datatable')

        handleDeleteCheckboxes(brands)

        deleteSingleRecord(brands, brandsDatatable);

        deleteManyRecords(brands, brandsDatatable)

    </script>
@endsection