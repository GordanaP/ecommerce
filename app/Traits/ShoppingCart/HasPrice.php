<?php

namespace App\Traits\ShoppingCart;

trait HasPrice
{
    /**
     * Calculate the cart subtotal (total - (tax + shipping)).
     *
     * @param  string  $cart
     * @return integer
     */
    protected function calculateCartSubtotal($cart)
    {
        $content = $this->getContent($cart);

        $subtotal = $content->reduce(function ($subtotal, $item)
        {
            return $subtotal + $item->subtotal;
        });

        return $subtotal;
    }

    /**
     * Calculate the tax amount = subtotal * tax rate.
     *
     * @param  string  $cart
     * @return integer
     */
    protected function calculateCartTaxAmount($cart)
    {
        $taxRate = 0.2;

        $taxAmount = $this->calculateCartSubtotal($cart) * $taxRate;

        return $taxAmount;
    }

    /**
     * Calculate the shipping costs.
     *
     * @param  string  $cart
     * @return integer
     */
    protected function calculateShippingCosts($cart)
    {
        return 1000;
    }

    /**
     * Calculate the cart total = subtotal + taxAmount + shippingCosts.
     *
     * @param  string  $cart
     * @return integer
     */
    protected function calculateCartTotal($cart)
    {
        $total = collect([
            $this->calculateCartSubtotal($cart),
            $this->calculateCartTaxAmount($cart),
            $this->calculateShippingCosts($cart)
        ])->sum();

        return $total;
    }
}