<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'type' => $this->type,
            'order' => (int) $this->order,
            'dimensions' => $this->dimensions ?? null,
        ];

        if ($this->isTypeBanners())
            $data['banners'] = BannerResource::collection($this->banners);
        if ($this->isTypeCollection())
            $data['collection'] = new CollectionResource($this->collection);

        return $data;
    }
}
