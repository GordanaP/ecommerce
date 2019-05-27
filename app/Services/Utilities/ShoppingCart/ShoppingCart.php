<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Facades\Price;
use Illuminate\Support\Collection;
use App\Traits\ShoppingCart\HasPrice;
use App\Traits\ShoppingCart\HasContent;
use Illuminate\Support\Facades\Session;

class ShoppingCart
{
    use HasContent, HasPrice;

    /**
     * Add an item to the cart.
     *
     * @param  \App\Product  $product
     * @param  integer  $qty
     * @param  string  $cart
     * @return void
     */
    public function addItem($product, $qty = 1, $cart)
    {
        $item    = $this->createItem($product, $qty);

        $content = $this->getContent($cart);

        $this->addToCart($item, $content);

        $this->updateCart($cart, $content);
    }

    /**
     * Get the cart content.
     *
     * @param  string  $cart
     * @return \Illuminate\Support\Collection
     */
    public function getContent($cart)
    {
        return Session::has($cart) ? Session::get($cart) : new Collection;
    }

    /**
     * Remove an item from the cart.
     *
     * @param  string  $rowId
     * @param  string  $cart
     * @return void
     */
    public function removeItem($rowId, $cart)
    {
        $content = $this->getContent($cart);

        $content->pull($rowId);

        $this->updateCart($cart, $content);
    }

    /**
     * Update the cart content.
     *
     * @param  string  $rowId
     * @param  integer  $qty
     * @param  string  $cart
     * @return void
     */
    public function updateItem($rowId, $qty, $cart)
    {
        $content = $this->getContent($cart);

        $item = $content->get($rowId);

        $this->createItem($item, $qty);

        if ($qty <= 0)
        {
            $this->removeItem($rowId, $cart);
        }
    }

    /**
     * Remove all items from the cart.
     *
     * @param  string  $cart
     * @return void
     */
    public static function empty($cart)
    {
        Session::forget($cart);
    }

    /**
     * Get the total # of cart items.
     *
     * @param  string  $cart
     * @param  string  $field
     * @return integer
     */
    public function itemsCount($cart, $field = 'qty')
    {
        $content = $this->getContent($cart);

        return $content->sum($field);
    }

    /**
     * Determine if there is a product in the cart.
     *
     * @param  string  $cart
     * @param  string  $field
     * @return boolean
     */
    public function isNotEmpty($cart, $field = 'qty')
    {
        return $this->itemsCount($cart, $field) > 0;
    }

    /**
     * Determine if the cart contains a specific product.
     *
     * @param  \App\Product  $product
     * @param  string  $cart
     * @return boolean
     */
    public function hasProduct($product, $cart)
    {
        $item = $this->getContent($cart)->firstWhere('id', $product->id);

        return $this->getContent($cart)->contains($item);
    }

    /**
     * Calculate the cart subtotal.
     *
     * @param  string  $cart
     * @return string
     */
    public function subtotal($cart)
    {
        $subtotal = $this->calculateCartSubtotal($cart);

        return Price::present($subtotal);
    }

    /**
     * Calculate the amount of tax on the cart subtotal.
     *
     * @param string $cart
     * @return string;
     */
    public function taxAmount($cart)
    {
        $taxAmount = $this->calculateCartTaxAmount($cart);

        return Price::present($taxAmount);
    }

    /**
     * Calculate the shipping costs.
     *
     * @param  string $cart
     * @return string
     */
    public function shippingCosts($cart)
    {
        $shippingCosts = $this->calculateShippingCosts($cart);

        return Price::present($shippingCosts);
    }

    /**
     * Calculate the cart total.
     *
     * @param string $cart
     * @return string
     */
    public function total($cart)
    {
        $total = $this->calculateCartTotal($cart);

        return Price::present($total);
    }

    /**
     * Display tax rate.
     *
     * @return string
     */
    public function presentTaxRate()
    {
        return (config('cart.tax') * 100) . '%';
    }
}
