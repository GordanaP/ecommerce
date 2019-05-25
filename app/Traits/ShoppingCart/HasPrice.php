<?php

namespace App\Traits\ShoppingCart;

trait HasPrice
{
    /**
     * Get the total number of items in the cart.
     *
     * @param  string $cart
     * @return integer
     */
    protected function calculateCartItemsCount($cart)
    {
        $content = $this->getCartContent($cart);

        $itemsCount = $this->calculateItemsCount($content);

        return $itemsCount;
    }

    /**
     * Calculate the cart subtotal (total - (tax + shipping))
     *
     * @param  string $cart
     * @return float
     */
    protected function calculateCartSubtotal($cart)
    {
        $content = $this->getCartContent($cart);

        $subtotal =  $this->calculateSubtotal($content);

        return formatNumber($subtotal);
    }

    /**
     * Calculate the amount of tax.
     *
     * @param  string $cart
     * @return float
     */
    protected function calculateCartTax($cart)
    {
        $taxRate = config('cart.tax');

        $taxAmount = $this->calculateTax($taxRate, $cart);

        return formatNumber($taxAmount);
    }

    /**
     * Get the total price of the cart (subtotal + taxAmount + shipping).
     *
     * @param  string $cart
     * @return float
     */
    protected function calculateCartTotal($cart)
    {
        $content = $this->getCartContent($cart);

        $taxAmount = $this->calculateCartTax($cart);

        $total = $this->calculateTotal($content, $taxAmount);

        return formatNumber($total);
    }

    /**
     * The cart items count.
     *
     * @param  Illuminate\Support\Collection $content
     * @return integer
     */
    private function calculateItemsCount($content)
    {
        $itemsCount = $content->sum('qty');

        return $itemsCount;
    }

    /**
     * The cart subtotal.
     *
     * @param  Illuminate\Support\Collection $content
     * @return float
     */
    private function calculateSubtotal($content)
    {
        $subtotal = $content->reduce(function ($subtotal, $product)
        {
            return $subtotal + $product->subtotal;
        });

        return $subtotal;
    }

    /**
     * The tax amount.
     *
     * @param  integer $taxRate
     * @param  string $cart
     * @return float
     */
    private function calculateTax($taxRate, $cart)
    {
        $taxAmount = $this->calculateCartSubtotal($cart) * $taxRate/100;

        return $taxAmount;
    }

    /**
     * The cart total.
     *
     * @param  Illuminate\Support\Collection $content
     * @param  float $taxAmount
     * @return float
     */
    private function calculateTotal($content, $taxAmount)
    {
        $total = $content->reduce(function ($total, $product) use($taxAmount) {

            return $total + $product->subtotal;

        }, $taxAmount);

        return $total;
    }
}