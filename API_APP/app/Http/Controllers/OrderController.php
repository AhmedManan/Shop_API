<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(
            // OrderModel::where('buyer_id', Auth::user()->id)->get()
            OrderModel::where('buyer_id', Auth::user()->id)
                                ->orWhere('seller_id', Auth::user()->id)
                                ->get()
        );
    }

    public function store(StoreOrderRequest $request)
    {
        $product = ProductModel::where('product_models.id', request()->product_id) // Specify 'product_models.id' here
        ->select('product_models.name as product_name', 'product_models.price as product_price', 'product_models.quantity as product_quantity', 'users.name as seller_name')
        ->leftJoin('users', 'users.id', '=', 'product_models.seller_id')
        ->first();
        if(request()->product_quantity>)
        echo '<pre>';
        print_r($product);
        exit;

        $validatedData = $request->validated();
        $order= OrderModel::create([
            'buyer_id'=>Auth::user()->id,
            'buyer_name'=>Auth::user()->name,
            'product_id' =>request()->product_id,
            'product_name' =>$product->product_name,
            'product_quantity' =>request()->product_quantity,
            'buyer_mobileno'=>request()->buyer_mobileno,
            'buyer_address'=>request()->buyer_address,
            'billing_status'=>request()->billing_status,
            'billing_type'=>request()->billing_type,
            'order_price'=>request()->order_price,
            'order_status'=>request()->order_status,
            'order_notes'=>request()->order_notes,
            'priority'=>request()->priority,
            'seller_id'=>request()->seller_id,
            'seller_name'=>request()->seller_name,

        ]);
        return new OrderResource($order);
    }
}
