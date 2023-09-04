<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $fillable=[
        'seller_id', 'name', 'description', 'price', 'quantity', 'product_pic'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
