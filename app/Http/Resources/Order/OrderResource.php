<?php

namespace App\Http\Resources\Order;

use App\Facades\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'identifier' => $this->present_number,
            'amount' => Price::toUnit($this->total),
            'is_completed' => $this->paid,
            'link' => [
                'show' => route('orders.show', $this),
                'edit' => route('orders.edit', $this),
            ]
        ];
    }
}
