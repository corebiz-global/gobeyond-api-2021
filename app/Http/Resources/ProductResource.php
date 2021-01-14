<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'rating' => $this->rating,
            'price' => $this->price,
            'promotional_price' => $this->promotional_price,
            'installment_limit' => $this->installment_limit,
        ];
    }
}
