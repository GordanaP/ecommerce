<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
