<?php

namespace App\Http\Resources\reviews;

#use Illuminate\Http\Resources\Json\ResourceCollection; 
//this is the default and modified to get all collections
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // 'id' => $this->id,
            // 'p_id' => $this->product_id,
            'name' => $this->customer,
            'review' => $this->review,
            'ratings' => $this->star =='0' ? 'No Reviews' : $this->star,
            'created_at' => $this->created_at,
            'href'=> [
                'link' => route('reviews.destroy',[$this->product_id,$this->id,])
            ]
        ];
    }
}
