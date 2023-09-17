<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\ProductModel;
use App\Traits\HTTPResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    use HTTPResponses;
    public function index()
    {
        return ProductResource::collection(
            ProductModel::where('seller_id', Auth::user()->id)->get()
        );
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        // Handle product picture upload
        if ($request->hasFile('product_pic')) {
            $originalFileName = $request->file('product_pic')->getClientOriginalName();
            $extension = $request->file('product_pic')->getClientOriginalExtension();
            $randomDigits = rand(100000, 999999);
            $newFileName = 'pdt_' . $randomDigits . '.' . $extension;

            $productPicPath = Storage::disk('secure_storage')->putFileAs('product_pics', $request->file('product_pic'), $newFileName);
        } else {
            $productPicPath = null;
        }

        $product = ProductModel::create([
            'seller_id' => Auth::user()->id,
            'name' => request()->name,
            'description' => request()->description,
            'category' => request()->category,
            'quantity' => request()->quantity,
            'price' => request()->price,
            'product_pic' => $productPicPath,
        ]);

        return new ProductResource($product);
    }
}
