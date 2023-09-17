<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'quantity',
        'product_pic',
        'seller_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
