<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order' => [
                'order_price' => $this->price,
                'order_status' => $this->status,
                'order_notes' => $this->notes,
                'priority' => $this->priority,
            ],
            'buyer' => [
                'buyer_id' => $this->user->id,
                'buyer_name' => $this->user->name,
                'buyer_mobileno' => $this->buyer_mobileno,
                'buyer_address' => $this->buyer_address,
            ],
            'billing' => [
                'billing_type' => $this->billing_type,
                'billing_status' => $this->billing_status,
            ],
            'product' => [
                'product_id' => $this->product_id,
                'product_name' => $this->product_name,
                'product_quantity' => $this->product_quantity,
            ],
            'seller' => [
                'seller_id' => $this->seller_id,
                'seller' => $this->seller_name,
            ]
        ];
    }
}
