<?php

namespace App\Http\Resources\Brand;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'link' => [
                'show' => route('brands.show', $this),
                'edit' => route('brands.edit', $this),
            ]
        ];
    }
}
