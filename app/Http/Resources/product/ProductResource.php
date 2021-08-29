<?php

namespace App\Http\Resources\product;

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
        return[
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == '0' ? 'out of stock' : $this->stock,
            'rating' => $this->review->count() > 0 ? round($this->review->sum('star')/$this->review->count(),2) : '0',
            'discount' => $this->discount,
            'total_price' => round((1-($this->discount/100))*$this->price ,2),
            'href' => [
                'reviews' => route('reviews.index',$this->id)
            ]
        ];
    }
}
