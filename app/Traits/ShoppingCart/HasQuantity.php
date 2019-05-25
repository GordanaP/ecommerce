<?php

namespace App\Traits\ShoppingCart;

trait HasQuantity
{
    /**
     * Count the cart items.
     *
     * @param  string $cart
     * @return int
     */
    protected function countCartItems($cart)
    {
        $content = $this->getCartContent($cart);

        $itemsCount = $content->sum('qty');

        return $itemsCount;
    }
}