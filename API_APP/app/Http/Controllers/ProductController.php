<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\ProductModel;
use App\Traits\HTTPResponses;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    use HTTPResponses;
    public function index()
    {
        return ProductResource::collection(ProductModel::all());
    }
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $product= ProductModel::create([
            'user_id'=>Auth::user()->id,
            'name'=>request()->name,
            'description'=>request()->description,
            'category'=>request()->category,
            'quantity'=>request()->quantity,
            'price'=>request()->price,
        ]);
        return new ProductResource($product);
    }
}
