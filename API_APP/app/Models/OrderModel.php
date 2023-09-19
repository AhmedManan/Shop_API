<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Specify the table name

    protected $fillable = [
        'product_id',
        'product_name',
        'product_quantity',
        'buyer_id',
        'buyer_name',
        'buyer_mobileno',
        'buyer_address',
        'billing_status',
        'billing_type',
        'discount',
        'order_price',
        'order_status',
        'order_notes',
        'order_priority',
        'seller_id',
        'seller_name',
    ];

    // Define the relationships

    // The product associated with the order
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    // The buyer of the order
    public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    // The seller of the order
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
