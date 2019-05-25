table(toLower(items)).DataTable({
    "ajax": {
        "url": itemsIndexUrl,
        "type": "GET"
    },
    "deferRender": true,
    "columns": [
        {
            data: 'ui',
        },
        {
            data: 'title',
        },
        {
            data: 'price',
        },
        {
            render: function(data, type, row, meta) {

                return '<a href="' + row.link.show + '"><svg class="fill-current text-grey hover:text-grey-darker inline-block h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg></a><button class="text-blue" id="addToCart" value="' + row.ui + '">Add To cart</button>'
            },

            searchable: false,
            sortable: false,

        },
        {
            data: 'link.show',
            visible: false
        },
    ],
    responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 2 },
        {
            targets: 3,
            className: 'dt-body-right'
        },
    ],
    "order": [
        [ 1, "desc" ]
    ],
});