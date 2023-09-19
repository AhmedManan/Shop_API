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
                'order_price' => $this->order_price,
                'order_status' => $this->order_status,
                'order_notes' => $this->order_notes,
                'order_priority' => $this->order_priority,
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
                'discount' => $this->discount,
            ],
            'product' => [
                'product_id' => $this->product_id,
                'product_name' => $this->product_name,
                'product_quantity' => $this->product_quantity,
            ],
            'seller' => [
                'seller_id' => $this->seller_id,
                'seller' => $this->seller_name,
            ],
            'date' => [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
        ];
    }
}
