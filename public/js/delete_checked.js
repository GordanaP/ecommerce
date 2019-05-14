/**
 * Delete a single record.
 *
 * @param  {string} deleteButton
 * @param  {string} items
 * @param  {object} datatable
 * @return {void}
 */
function deleteSingleRecord(items, datatable)
{
    $(document).on('click', '#'+toLower(items)+'DeleteOne', function() {

        var record = $(this).val();
        var deleteUrl = 'api/'+ toLower(items) +'/' + record;

        $.ajax({
            type: 'DELETE',
            url: deleteUrl,
            success: function(response) {

                datatable.ajax.reload();

                sendSuccessNotification(response.alertMessage)
            }
        });
    });
}

/**
 * Delete multiple records.
 *
 * @param  {string} items
 * @param  {object} datatable
 * @return {void}
 */
function deleteManyRecords(items, datatable)
{
    $(document).on('click', '#deleteAll'+items, function() {

        var deleteUrl = 'api/'+ toLower(items);

        $.ajax({
            type: 'DELETE',
            url: deleteUrl,
            data: {
                ids: getCheckedValues(items)
            },
            success: function(response) {

                deleteAllButton(items).hide()

                uncheck(checkAllCheckbox(items));

                datatable.ajax.reload()

                sendSuccessNotification(response.alertMessage)
            }
        });
    });
}

/**
 * Get checked values.
 *
 * @param  {string} items
 * @return {array}
 */
function getCheckedValues(items)
{
    var ids = [];

    $('input[name*="' + toLower(items) + '"]:checked').each(function() {
       ids.push($(this).val());
    });

    return ids;
}

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
