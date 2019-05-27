<?php

namespace App\Traits\ShoppingCart;

use App\Facades\Price;
use Illuminate\Support\Facades\Session;

trait HasContent
{
    /**
     * Create a cart item.
     *
     * @param  \App\Product  $product
     * @param  integer  $qty
     * @return \App\Product
     */
    protected function createItem($product, $qty)
    {
        $product->qty = $qty;

        $product->subtotal = $product->price * $product->qty;

        return $product;
    }

    /**
     * Add an item to the cart.
     *
     * @param  \App\Product  $product
     * @param  \Illuminate\Support\Collection  $content
     * @return void
     */
    protected function addToCart($product, $content)
    {
        $rowId = $this->generateRowId($product->id);

        $content->put($rowId, $product);
    }

    /**
     * Update the cart.
     *
     * @param  string  $cart
     * @param  \Illuminate\Support\Collection  $content
     * @return void
     */
    protected function updateCart($cart, $content)
    {
        Session::put($cart, $content);
    }

    /** Generate an item's rowId.
     *
     * @param  integer $id
     * @return string
     */
    protected function generateRowId($id)
    {
        return md5($id);
    }

    /**
     * Get an item's identifier.
     *
     * @param  string  $cart
     * @return integer
     */
    protected function itemIdentifier($cart)
    {
        return $cart == 'laracommerce' ? 'product_id' : 'id';
    }
}