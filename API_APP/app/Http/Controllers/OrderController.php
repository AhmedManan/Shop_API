<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
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
        $validatedData = $request->validated();
        
        $product = ProductModel::where('product_models.id', request()->product_id) // Specify 'product_models.id' here
        ->select('product_models.name as product_name', 'product_models.price as product_price', 'product_models.quantity as product_quantity', 'product_models.id as product_id', 'users.id as seller_id', 'users.name as seller_name')
        ->leftJoin('users', 'users.id', '=', 'product_models.seller_id')
        ->first();
        // echo '<pre>';
        // print_r($product);
        // exit;

        if(request()->product_quantity>$product->product_quantity){
            return json_encode('prodcut quantity exceeds');
        }
        else{

            $quantity_update=$product->product_quantity-request()->product_quantity;
            ProductModel::where('id', $product->product_id)->update(['quantity' => $quantity_update]);

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
                'seller_id'=>$product->seller_id,
                'seller_name'=>$product->seller_name,
    
            ]);
            return new OrderResource($order);
        }

    }
}
