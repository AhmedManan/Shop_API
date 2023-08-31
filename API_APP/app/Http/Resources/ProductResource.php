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
            'id' =>(string)$this->id,
            'attributes' => [
                'name'=>$this->name,
                'description' => $this->description,
                'category' => $this->category,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'updated_at' => $this->updated_at,
                'created_at' => $this->updated_at

            ],
            'relationships' => [
                'id'=>$this->user->id,
                'name'=>$this->user->name
            ]
        ];
    }
}
