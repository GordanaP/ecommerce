<tr>
    <td colspan="4" class="text-right">
        <p class="font-bold mb-2">Subtotal:</p>
        <p class="mb-2">Shipping & Handling:</p>
        <p class="mb-2">Tax ({{ ShoppingCart::presentTaxRate() }}):</p>
        <p class="mb-0 uppercase font-bold">Grand Total:</p>
    </td>

    <td class="text-right">
        <p class="font-bold mb-2">
            {{ ShoppingCart::subtotal() }}
        </p>
        <p class="mb-2">
            {{ ShoppingCart::shippingCosts() }}
        </p>
        <p class="mb-2">
            {{ ShoppingCart::taxAmount() }}
        </p>
        <p class="font-bold mb-1">
            {{ ShoppingCart::total() }}
        </p>
    </td>

    <td></td>
</tr>