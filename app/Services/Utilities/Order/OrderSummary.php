<?php

namespace App\Services\Utilities\Order;

use App\Facades\Price;

class OrderSummary
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function presentItemSubtotal($item)
    {
        return Price::present($this->itemSubtotal($item));
    }

    public function presentSubtotal()
    {
        return Price::present($this->order->subtotal);
    }

    public function presentTaxAmount()
    {
        return Price::present($this->order->tax_amount);
    }

    public function presentTotal()
    {
        return Price::present($this->order->total);
    }

    public function presentTaxRate()
    {
        return (config('cart.tax') * 100) . '%';
    }

    public function billingAddress()
    {
        $this->order->customer->address;
    }

    protected function itemSubtotal($item)
    {
        return $item->incart->quantity * $item->incart->price;
    }
}
