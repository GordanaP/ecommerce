/**
 * Send a succes notification to a user.
 *
 * @param  string message
 * @return array
 */
function sendSuccessNotification(message)
{
    return toastr["success"](message)
}

/**
 * Delete a single record.
 *
 * @param  string button
 * @param  string url
 * @param  string datatable
 * @param  string location
 * @return void
 */
 function deleteSingleRecord(button, url, datatable, location)
 {
     $(document).on('click', button, function(e) {

        e.preventDefault();

        var record = $(this).attr('data-category');
        var url = url + '/' + record;


         swalDelete(url, datatable, location);
     });
 }

/**
 * Delete multiple records.
 *
 * @param  string checkbox
 * @param  string deleteUrl
 * @param  string datatable
 * @param  string locationField
 * @return void
 */
function deleteManyRecords(items, deleteUrl, datatable, locationField)
{
    $(document).on('click', '#delete'+items, function(e) {
        e.preventDefault();

        var data = {
            ids: getCheckedValues(items.toLowerCase())
        }

        swalDeleteMany(items, deleteUrl, datatable, locationField, data)
    });
}

/**
 * Alert the user on deletion a single item
 *
 * @param  string url
 * @param  object datatable
 * @param  string field
 * @return void
 */
function swalDelete(url, datatable, locationField)
{
    swal({
        title: 'Are you sure you want to delete the record?',
        text: 'You will not be able to recover the record.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if(result.value == true)
        {
            $.ajax({
                type: 'DELETE',
                url: url,
                success: function(response) {
                    countDTRows(datatable) == 1 ? $(locationField).load(location.href + ' ' + locationField) : datatable.ajax.reload();
                    sendSuccessNotification(response.alertMessage)
                }
            })
        }
    });
}

/**
 * Alert the user on deletion multiple items
 *
 * @param  string url
 * @param array data
 * @param  object datatable
 * @param  string field
 * @return void
 */
function swalDeleteMany(items, url, datatable, locationField, data)
{
    swal({
        title: 'Are you sure you want to delete the records?',
        text: 'You will not be able to recover the records.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if(result.value == true)
        {
            $.ajax({
                type: 'DELETE',
                url: url,
                data: data,
                success: function(response) {
                    countDTRows(datatable) == 1 || allValuesChecked(items) ? $(locationField).load(location.href + ' ' + locationField) : datatable.ajax.reload();
                    sendSuccessNotification(response.alertMessage)
                    $('#delete'+items).hide()
                    $('#checkAll'+items).prop('checked', false);
                }
            })
        }
    });
}

/**
 * Get the checked values.
 *
 * @param  string name
 * @return array
 */
function getCheckedValues(name)
{
    var values = [];

    $('input[name*="' + name + '"]:checked').each(function() {
       values.push($(this).val());
    });

    return values;
}

/**
 * Get a total # of the datatable rows
 *
 * @param  object datatable
 * @return integer
 */
function countDTRows(datatable)
{
    return datatable.data().count();
}

/**
 * Get the # of checked values.
 *
 * @param  string $name
 * @return integer
 */
function countChecked(name)
{
    return $('input[name*="' + name + '"]:checked').length;
}

/**
 * Determine if all checkbox values are checked
 *
 * @param  string items
 * @return boolewn
 */
function allValuesChecked(items)
{
    return $(".checkitem"+items+":checked").length == $(".checkitem"+items).length
}

function noValuesChecked(checkbox)
{
    return countChecked(checkbox) == 0
}

/**
 * Check all values in a datatable checkbox.
 *
 * @param  string items
 * @param  string table
 * @param  string deleteManyButton
 * @return void
 */
function checkAll(items, table, button)
{
    table.on('click', "#checkAll"+items, function () {

        // If all checked, display deleteMany btn
        $('.checkitem'+items).prop('checked', $(this).prop("checked"));
        showButton(button)

        // If all unchecked, remove deleteMany btn
        if($(this).prop("checked") == false) {
            hideButton(button)
        }
    });

    table.on('click', ".checkitem"+items, function () {

        // If one box checked, display hidden btn
        if(isCheckedStatus($(this), true)) {
            showButton(button)
        }

        // If one box unchecked, uncheck checkAll box
        if(isCheckedStatus($(this), false)) {
            checkAllStatus(items, false)
        }

        // If all boxes are checked, check checkAll box
        if(allValuesChecked(items)) {
            checkAllStatus(items, true)
        }

        // If all boxes unchecked, remove delete button Id
        if(noValuesChecked(items.toLowerCase())) {
            hideButton(button)
        }
    });
}


function isCheckedStatus(checkbox, status)
{
    return checkbox.prop("checked") == status;
}

function checkAllStatus(items, status)
{
    return $('#checkAll'+items).prop('checked', status);
}

function hideButton(button)
{
    return button.hide()
}

function showButton(button)
{
    return button.show()
}