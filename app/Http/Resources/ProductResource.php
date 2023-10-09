<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'article' => $this->article,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'price_cp' => $this->price_cp,
            'count' => $this->count,
            'units' => $this->units,
            'image' => $this->image,
            'specifications' => $this->specifications,
            'main_page' => $this->main_page,
            'category' => $this->category
        ];
    }
}
