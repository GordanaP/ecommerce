<?php

namespace App;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasDate;

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
}
