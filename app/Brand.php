<?php

namespace App;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasDate;

    protected $fillable = ['name'];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
