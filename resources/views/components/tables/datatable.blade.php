<table class="table hover mt-2 datatable w-full" cellspacing="0" width="100%"
    id="{{ $items }}Table">

    <thead class="bg-grey-lightest text-grey-dark text-xs uppercase">
        <th style="width: 5%">
            <label class="checkbox-container mb-4">
                <input type="checkbox" id="checkAll{{ ucfirst($items) }}">
                <span class="checkmark"></span>
            </label>
        </th>

        <th style="width: 10%">UI</th>

        {{ $slot }}

        <th class="w-1/5"></th>
    </thead>

    <tbody></tbody>

</table>