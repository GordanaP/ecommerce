<?php

namespace App\Traits\ShoppingCart;

use App\Facades\Price;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

trait HasContent
{
    /**
     * Create the cart content.
     *
     * @param  \App\Product $product
     * @param  integer $qty
     * @param  string $cart
     * @return void
     */
    protected function createCartContent($product, $qty, $cart)
    {
        $item    = $this->createCartItem($product, $qty);

        $content = $this->getCartContent($cart);

        $this->addToCart($item, $content);

        $this->updateCart($cart, $content);
    }

    /**
     * Get the cart content.
     *
     * @param  string $cart
     * @return \Illuminate\Support\Collection
     */
    protected function getCartContent($cart)
    {
        $content = Session::has($cart) ? Session::get($cart) : new Collection;

        return $content;
    }

    /**
     * Remove the item from the cart.
     *
     * @param  string $rowId
     * @param  string $cart
     * @return void
     */
    protected function removeFromCartContent($rowId, $cart)
    {
        $content = $this->getCartContent($cart);

        $this->removeFromCart($rowId, $content);

        $this->updateCart($cart, $content);
    }

    /**
     * Update the cart item quantity.
     *
     * @param  string $rowId
     * @param  integer $qty
     * @param  string $cart
     * @return void
     */
    protected function updateItemQuantity($rowId, $qty, $cart)
    {
        $product = $this->findCartItem($rowId, $cart);

        $this->createCartItem($product, $qty);

        if ($qty <= 0)
        {
            $this->removeFromCartContent($rowId, $cart);
        }
    }

    /**
     * Get the cart item identifier.
     *
     * @param  string $cart
     * @return integer
     */
    protected function itemIdentifier($cart = 'default')
    {
        $identifier = $cart == 'default' ? 'product_id' : 'id';

        return $identifier;
    }

    /**
     * Create the cart item.
     *
     * @param  \App\Product $product
     * @param  integer $qty
     * @return \App\Product
     */
    private function createCartItem($product, $qty)
    {
        $product->qty = $qty;

        $product->subtotal = Price::getFormatted($product->price * $product->qty);

        return $product;
    }

    /**
     * Add the item to the cart.
     *
     * @param  \App\Product $product
     * @param  \Illuminate\Support\Collection $content
     * @return void
     */
    private function addToCart($product, $content)
    {
        $rowId = $this->generateRowId($product->id);

        $content->put($rowId, $product);
    }

    /**
     * Update the cart.
     *
     * @param  string $cart
     * @param  \Illuminate\Support\Collection $content
     * @return void
     */
    private function updateCart($cart, $content)
    {
        Session::put($cart, $content);
    }

    /**
     * Remove the item from the cart.
     *
     * @param  string $rowId
     * @param  \Illuminate\Support\Collection $content
     * @return void
     */
    private function removeFromCart($rowId, $content)
    {
        $content->pull($rowId);
    }

    /**
     * Find the cart item.
     *
     * @param  string $rowId
     * @param  string $cart
     * @return \App\Product
     */
    private function findCartItem($rowId, $cart)
    {
        $content = $this->getCartContent($cart);

        $item = $content->get($rowId);

        return $item;
    }

    /**
     * Generate the item's rowId.
     *
     * @param  integer $id
     * @return string
     */
    private function generateRowId($id)
    {
        $rowId = md5($id);

        return $rowId;
    }
}