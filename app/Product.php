<?php

namespace App;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;
use App\Services\ValueObjects\Image;

class Product extends Model
{
    use HasDate;

    protected $fillable = ['name', 'description', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    public function setPriceAttribute($value)
    {
        return $this->attributes['price'] = $value * 100;
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPresentPriceAttribute()
    {
        return $this->price/100;
    }

    public function getImageAttribute($value)
    {
        return new Image($value);
    }

    public static function createNew(array $data, Category $category = null, Brand $brand = null)
    {
        $attributes = static::presentAttributes($data);

        $product = tap(static::create($attributes))
            ->addCategory($category ?: $data['category_id'])
            ->addBrand($brand ?: $data['brand_id'])
            ->save();

        return $product;
    }

    public function saveChanges(array $data)
    {
        if(request('image') OR request('delete_image'))
        {
            $this->image->removeFromStorage($this->image);
        }

        tap($this)->update(static::presentAttributes($data))
            ->addCategory($data['category_id'])
            ->addBrand($data['brand_id'])
            ->save();
    }

    public function remove()
    {
        $this->image->removeFromStorage($this->image);

        $this->delete();
    }

    public function addCategory($category)
    {
        return $this->category()->associate($category);
    }

    public function addBrand($brand)
    {
        return $this->brand()->associate($brand);
    }

    public static function presentAttributes(array $attributes)
    {
        request('image') ? $attributes['image'] = request('image')->store('products', 'public') : '';

        request('delete_image') ? $attributes['image'] = NULL : '';

        return $attributes;
    }

}
