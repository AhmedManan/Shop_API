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
            'id' => (string) $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'category' => $this->category,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'product_pic' => $this->product_pic, // Add this line
                // 'product_pic_link' => $this->product_pic ? asset('product-pics/' . $this->product_pic) : null, // New product_pic_link field
                'updated_at' => $this->updated_at,
                'created_at' => $this->created_at // Fix this line to use created_at
            ],
            'relationships' => [
                'seller_id' => $this->user->id,
                'seller' => $this->user->name
            ]
        ];
    }
}
