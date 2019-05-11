/**
 * Handle multiple checkboxes status.
 *
 * @param  {string} items
 * @return void
 */
function handleDeleteCheckboxes(items)
{
    // Hide delete button
    deleteAllButton(items).hide()

    // Handle check #checkAll checkbox
    table(items).on('click', "#checkAll"+items, function () {

        // If #checkAll is checked - check all other checkboxes & show delete button
        checkOneCheckbox(items).prop('checked', check($(this)));
        deleteAllButton(items).show();

        // If #checkAll is unchecked - hide delete button
        if(isNotChecked($(this))) {
            deleteAllButton(items).hide();
        }
    });

    // Handle check single checkboxes
    table(items).on('click', ".check"+items, function () {

        // If at least one single checkbox is checked - display delete button
        if(isChecked($(this))) {
            deleteAllButton(items).show();
        }

        // If at least one single checkbox is unchecked, uncheck #checkAll
        if(isNotChecked($(this))) {
            uncheck(checkAllCheckbox(items))
        }

        // If all single checkboxes are checked - check #checkAll
        if(countCheckedCheckboxes(items) == countAllCheckboxes(items)) {
            checkAllCheckbox(items).prop('checked', true)
        }

        // If all single checkboxes are unchecked - hide delete button
        if(countCheckedCheckboxes(items) == 0) {
            deleteAllButton(items).hide();
        }
    });
}

/**
 * Get delete all button.
 *
 * @param  {string} items
 * @return {string}
 */
function deleteAllButton(items)
{
    return $('#deleteAll'+items);
}

/**
 * Get check all checkbox.
 *
 * @param  {string} items
 * @return {string}
 */
function checkAllCheckbox(items)
{
    return $('#checkAll'+items);
}

/**
 * Get check one checkbox.
 *
 * @param  {string} items
 * @return {string}
 */
function checkOneCheckbox(items)
{
    return $('.check'+items);
}

/**
 * Count checked checkboxes.
 *
 * @param  {string} items
 * @return {string}
 */
function countCheckedCheckboxes(items)
{
    return $('input[name*="'+ toLower(items) +'"]:checked').length;
}

/**
 * Count all checkboxes.
 *
 * @param  {string} items
 * @return {integer}
 */
function countAllCheckboxes(items)
{
    return checkOneCheckbox(items).length;
}

/**
 * Get datatable.
 *
 * @param  {string} items
 * @return {string}
 */
function table(items)
{
    return $('#'+ toLower(items) +'Table')
}

/**
 * Determine that a checkbox is checked.
 *
 * @param  {string}  checkbox
 * @return {Boolean}
 */
function isChecked(checkbox)
{
    return checkbox.prop("checked") == true;
}

/**
 * Determine that a checkbox is not checked.
 *
 * @param  {string}  checkbox
 * @return {Boolean}
 */
function isNotChecked(checkbox)
{
    return checkbox.prop("checked") == false;
}

/**
 * Check a checkbox.
 *
 * @param  {string} checkbox
 * @return {string}
 */
function check(checkbox)
{
    return checkbox.prop("checked");
}

/**
 * Uncheck a checkbox.
 *
 * @param  {string} checkbox
 * @return {string}
 */
function uncheck(checkbox)
{
    return checkbox.prop("checked", false);
}

/**
 * Turn to lowercase.
 *
 * @param  {string} string
 * @return {string}
 */
function toLower(string)
{
    return string.toLowerCase();
}