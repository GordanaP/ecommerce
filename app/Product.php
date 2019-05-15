<?php

namespace App;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasDate;

    protected $fillable = ['name', 'description', 'image'];

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public static function createNew(array $data)
    {
        $product = new static($data);

        $product->category()->associate($data['category_id']);

        $product->brand()->associate($data['brand_id']);

        $product->save();

        return $product;
    }

    public function saveChanges(array $data)
    {
        $this->update($data);

        $this->category()->associate($data['category_id']);

        $this->brand()->associate($data['brand_id']);

        $this->save();
    }
}
