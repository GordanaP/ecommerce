<?php

namespace App;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasDate;

    protected $fillable = [
        'first_name', 'last_name', 'address', 'city', 'postal_code', 'phone', 'email'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name .' ' .$this->last_name;
    }
}
