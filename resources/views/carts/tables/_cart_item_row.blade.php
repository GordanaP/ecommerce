<tr>
    <!-- Image -->
    <td class="border-b border-grey-light">
        <img src="{{ $item->image->display() }}" alt="{{ $item->name }}"
        class="w-1/2 rounded-sm">
    </td>

    <!-- Sku, Name & Description -->
    <td class="border-b border-grey-light">
        <p class="mb-2 text-muted text-xs">
            SKU
        </p>

        <p class="mb-1 font-semibold">
            <a href="{{ route('products.show', $item->id) }}">
                {{ $item->name }}
            </a>
        </p>
        <p class="text-xs mb-0 text-muted">
            {{ $item->description }}
        </p>
    </td>

    <!-- Price -->
    <td class="border-b border-grey-light text-center">
        {{ Price::present($item->price) }}
    </td>

    <!-- Qty -->
    <td class="border-b border-grey-light">
        @include('carts.forms._update_quantity')
    </td>

    <!-- Item subtotal -->
    <td class="border-b border-grey-light text-right">
        {{ Price::present($item->subtotal) }}
    </td>

    <!-- Trash -->
    <td class="border-b border-grey-light text-center">
        @include('carts.forms._remove_item')
    </td>
</tr>