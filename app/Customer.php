<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'address', 'city', 'postal_code', 'phone', 'email'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name .' ' .$this->last_name;
    }
}
