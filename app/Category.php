<?php

namespace App;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasDate;

    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
