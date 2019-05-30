<?php

namespace App;

use App\Traits\HasDate;
use App\Facades\ShoppingCart;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasDate;

    protected $fillable = [
        'first_name', 'last_name', 'address', 'city', 'postal_code', 'phone', 'email'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name .' ' .$this->last_name;
    }

    public static function createForOrder()
    {
        $customer = collect(ShoppingCart::getCustomer()->get('customer'));

        return static::create([
            'first_name' => $customer->get('first_name'),
            'last_name' => $customer->get('last_name'),
            'address' => $customer->get('address'),
            'postal_code' => $customer->get('postal_code'),
            'city' => $customer->get('city'),
            'email' => $customer->get('email'),
            'phone' => $customer->get('phone')
        ]);
    }
}
