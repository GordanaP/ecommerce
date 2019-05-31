<?php

namespace App;

use App\Customer;
use App\Traits\HasDate;
use App\Facades\ShoppingCart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasDate;

    protected $fillable = [
        'number', 'customer_id', 'subtotal', 'tax_amount', 'total', 'paid'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->as('incart')->withPivot('quantity', 'price');
    }

    public static function place($cart)
    {
        $order = static::getForCart($cart);

        static::attachItemsToOrder($order);

        ShoppingCart::empty();

        return $orderget;
    }

    protected static function getForCart($cart)
    {
        $order = new static([
            'subtotal' => ShoppingCart::calculateCartSubtotal($cart),
            'tax_amount' => ShoppingCart::calculateCartTaxAmount($cart),
            'total' => ShoppingCart::calculateCartTotal($cart),
            'paid' => true
        ]);

        return Customer::createForOrder()->addOrder($order);
    }

    protected static function attachItemsToOrder($order)
    {
        collect(ShoppingCart::getItems())->values()->map(function($item, $key) use ($order) {
            $order->products()->attach($item->id, [
                'quantity' => $item->qty,
                'price' => $item->price
            ]);
        });
    }

    public function getStatusAttribute()
    {
        return $this->paid ? 'paid' : 'pending';
    }
}
