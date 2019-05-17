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

    public static function createNew(array $data, Category $category = null, Brand $brand = null)
    {
        // $product = new static($data);

        // $product->category()->associate($data['category_id']);

        // $product->brand()->associate($data['brand_id']);

        // $product->save();

        // return $product;

        $product = new static($data);

        $product->addCategory($category ?: $data['category_id']);

        $product->brand()->associate($brand ?: $data['brand_id']);

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

    public function addCategory($category)
    {
        $this->category()->associate($category);
    }
}
