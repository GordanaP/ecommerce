<?php

namespace App\Services\Utilities\ShoppingCart;

use App\Traits\ShoppingCart\HasPrice;
use App\Traits\ShoppingCart\HasContent;
use Illuminate\Support\Facades\Session;

class ShoppingCart
{
    use HasContent, HasPrice;

    /**
     * Add an item to the cart.
     *
     * @param \App\Product $product
     * @param integer $qty
     * @param string $cart
     * @return  void
     */
    public function addItem($product, $cart='laracommerce', $qty = 1)
    {
        $this->createCartContent($product, $qty, $cart);
    }

    /**
     * Get the cart content.
     *
     * @param string $cart
     * @return \Illuminate\Support\Collection
     */
    public function getItems($cart)
    {
        return $this->getCartContent($cart);
    }

    /**
     * Remove the item from the cart.
     *
     * @param string $rowId
     * @param string $cart
     * @return void
     */
    public function removeItem($rowId, $cart = 'default')
    {
        $this->removeFromCartContent($rowId, $cart);
    }

    /**
     * Update the cart content.
     *
     * @param string $rowId
     * @param integer  $qty
     * @param string $cart
     * @return void
     */
    public function updateItem($rowId, $qty, $cart = 'default')
    {
        $this->updateItemQuantity($rowId, $qty, $cart);
    }

    /**
     * Remove all items from the cart.
     *
     * @param string $cart
     * @return void
     */
    public static function empty($cart)
    {
        Session::forget($cart);
    }

    /**
     * Get the number of items in the cart.
     *
     * @param string $cart
     * @return integer
     */
    public function itemsCount($cart = 'default')
    {
        return $this->calculateCartItemsCount($cart);
    }

    /**
     * The cart contains a specific product.
     *
     * @param  \App\Product  $product
     * @param  string  $cart
     * @return boolean
     */
    public function hasProduct($product, $cart='default')
    {
        // return ShoppingCart::getItems($cart)->firstWhere($this->itemIdentifier($cart), $product->id);
        return self::getItems($cart)->firstWhere($this->itemIdentifier($cart), $product->id);
    }

    /**
     * Get the cart subtotal (total - tax).
     *
     * @param string $cart
     * @return float
     */
    public function subtotal($cart = 'default')
    {
        return $this->calculateCartSubtotal($cart);
    }

    /**
     * Get the amount of tax calculated on cart subtotal.
     *
     * @param string $cart
     * @return float;
     */
    public function tax($cart = 'default')
    {
        return $this->calculateCartTax($cart);
    }

    /**
     * Get the cart total.
     *
     * @param string $cart
     * @return float
     */
    public function total($cart = 'default')
    {
        return $this->calculateCartTotal($cart);
    }
}