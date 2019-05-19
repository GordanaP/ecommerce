<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name' => $this->full_name,
            'email' => $this->email,
            'link' => [
                'show' => route('customers.show', $this),
                'edit' => route('customers.edit', $this),
            ]
        ];
    }
}
