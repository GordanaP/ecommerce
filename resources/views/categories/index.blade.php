@extends('layouts.app')

@section('content')
    <div class="container-fluid flex px-0">

        @include('admin.partials._sidebar')

        <div class="p-4 w-full">

            <h3 class="mb-3">Categories</h3>

            <hr>
            @if (App\Category::count())
            <table class="table hover mt-2 datatable w-full" cellspacing="0" width="100%"
                id="categoriesDatatable">

                <thead class="bg-grey-lightest text-grey-dark text-xs uppercase">
                    <th style="width: 5%">
                        <label class="checkbox-container mb-4">
                            <input type="checkbox" id="checkAllCategories">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th style="width: 10%">UI</th>
                    <th>Title</th>
                    <th class="w-1/5"></th>
                </thead>

                <tbody></tbody>
            </table>
            @else
                No categories at present.
            @endif

        </div>

    </div>
@endsection

@section('scripts')
    <script>

        // Datatable
        var categoriesTable = $('#categoriesDatatable');
        var categoriesIndexUrl = "{{ route('api.categories.index') }}";


        var categoriesDatatable = categoriesTable.DataTable({
            "ajax": {
                "url": categoriesIndexUrl,
                "type": "GET"
            },
            "deferRender": true,
            "columns": [
                {
                    render: function(data, type, row, meta) {
                      return '<div class="checkbox"><label class="checkbox-container"><input type="checkbox" class="checkitemUsers" name="categories[]" value="' + row.identifier + '"><span class="checkmark"></span></label></div>'
                    },
                    searchable: false,
                    sortable: false,
                },
                {
                    data: 'ui',
                },
                {
                    data: 'title',
                },
                {
                  render: function(data, type, row, meta) {
                    return '<a href="' + row.link.show + '"><svg class="fill-current text-grey-light hover:text-grey-darker inline-block h-8 w-12 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg></a><a href="' + row.link.edit + '"><svg class="fill-current text-grey-light hover:text-grey-darker inline-block h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg></a><button href="#" id="deleteCategory" data-category="' + row.ui + '"><svg class="fill-current text-grey-light hover:text-grey-darker inline-block h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg></a>'
                  },
                  searchable: false,
                  sortable: false,
                },
                {
                    data: 'link.show',
                    visible: false
                },
                {
                    data: 'link.edit',
                    visible: false
                },
            ],
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                {
                    targets: 3,
                    className: 'dt-body-right'
                },
            ],
            "order": [
                [ 1, "desc" ]
            ],
        });




    </script>
@endsection