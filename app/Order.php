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

    public function getPresentNumberAttribute($value)
    {
        return '#'.$this->number;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function createNew($cart)
    {
        $customer = Customer::createForOrder();

        $order = static::createForCustomer($customer, $cart);

        ShoppingCart::empty();
    }

    protected static function createForCustomer($customer, $cart)
    {
        return static::create([
            'customer_id' => $customer->id,
            'subtotal' => ShoppingCart::calculateCartSubtotal($cart),
            'tax_amount' => ShoppingCart::calculateCartTaxAmount($cart),
            'total' => ShoppingCart::calculateCartTotal($cart),
            'paid' => true
        ]);
    }
}
