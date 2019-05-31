<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Facades\Price;
use Illuminate\Support\Collection;
use App\Traits\ShoppingCart\HasPrice;
use App\Traits\ShoppingCart\HasContent;
use Illuminate\Support\Facades\Session;

define('CART_NAME', config('cart.name'));

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
    public function addItem($product, $qty = 1, $cart = CART_NAME)
    {
        $item    = $this->createItem($product, $qty);

        $content = $this->getContent($cart);

        $this->addToCart($item, $content);

        $this->updateCart($cart, $content);
    }

    public function addCustomer($customer, $cart = CART_NAME)
    {
        if ($this->isNotEmpty($cart)) {

            Session::get($cart)->put('customer', $customer);
        }
    }

    public function addShippingAddress($shippingAddress, $cart = CART_NAME)
    {
        if ($this->isNotEmpty($cart)) {

            Session::get($cart)->put('shipping', $shipping);
        }
    }

    /**
     * Get the cart content.
     *
     * @param  string  $cart
     * @return \Illuminate\Support\Collection
     */
    public function getContent($cart = CART_NAME)
    {
        return Session::has($cart) ? Session::get($cart) : new Collection;
    }

    /**
     * Get the cart content.
     *
     * @param  string  $cart
     * @return \Illuminate\Support\Collection
     */
    public function getItems($cart = CART_NAME)
    {
        return $this->getContent($cart)->except(['customer', 'shipping']);
    }

    /**
     * Get the cart content.
     *
     * @param  string  $cart
     * @return \Illuminate\Support\Collection
     */
    public function getCustomer($cart = CART_NAME)
    {
        return $this->getContent($cart)->only('customer');
    }


    public function getShippingAddress($cart = CART_NAME)
    {
        return $this->getContent($cart)->only('shipping');
    }

    /**
     * Remove an item from the cart.
     *
     * @param  string  $rowId
     * @param  string  $cart
     * @return void
     */
    public function removeItem($rowId, $cart = CART_NAME)
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
    public function updateItem($rowId, $qty, $cart = CART_NAME)
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
    public static function empty($cart = CART_NAME)
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
    public function itemsCount($cart = CART_NAME, $field = 'qty')
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
    public function isNotEmpty($cart = CART_NAME)
    {
        return $this->getItems($cart)->isNotEmpty();
    }

    /**
     * Determine if there is a product in the cart.
     *
     * @param  string  $cart
     * @param  string  $field
     * @return boolean
     */
    public function isEmpty($cart = CART_NAME)
    {
        return $this->getItems($cart)->isEmpty();
    }

    /**
     * Determine if the cart contains a specific product.
     *
     * @param  \App\Product  $product
     * @param  string  $cart
     * @return boolean
     */
    public function hasProduct($product, $cart = CART_NAME)
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
    public function subtotal($cart = CART_NAME)
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
    public function taxAmount($cart = CART_NAME)
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
    public function shippingCosts($cart = CART_NAME)
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
    public function total($cart = CART_NAME)
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
