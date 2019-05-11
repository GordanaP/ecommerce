@extends('layouts.app')

@section('content')
    <div class="container-fluid flex px-0">

        @include('admin.partials._sidebar')

        <main class="p-4 w-full">

            @datatable(['items' => 'categories'])

                <th>Title</th>

            @enddatatable

        </main>

    </div>
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