<?php

namespace App\Http\Resources\Product;

use App\Services\Utilities\Product\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ui' => $this->id,
            'title' => $this->name,
            'price' => Price::toFloat($this->present_price),
            'link' => [
                'show' => route('products.show', $this),
                'edit' => route('products.edit', $this),
            ]
        ];
    }
}
