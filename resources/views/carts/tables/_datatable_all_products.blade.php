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

            render: function(data, type, row, meta) {
                return '<a href="' + row.link.show + '">'+ data +'</a>'
            }
        },
        {
            data: 'price',
        },
        {
            render: function(data, type, row, meta) {

                return '<button class="text-blue" id="addToCart" value="' + row.ui + '">Add To Cart</button>'
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