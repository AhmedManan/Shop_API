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

        // Handle product picture upload
        if ($request->hasFile('product_pic')) {
            $originalFileName = $request->file('product_pic')->getClientOriginalName();
            $extension = $request->file('product_pic')->getClientOriginalExtension();
            $randomDigits = rand(100000, 999999);
            $newFileName = 'pdt_' . $randomDigits . '.' . $extension;

            $productPicPath = $request->file('product_pic')->storeAs('product_pics', $newFileName, 'public');
        } else {
            $productPicPath = null;
        }
        $product = ProductModel::create([
            'user_id' => Auth::user()->id,
            'name' => request()->name,
            'description' => request()->description,
            'category' => request()->category,
            'quantity' => request()->quantity,
            'price' => request()->price,
            'product_pic' => $productPicPath, // Save the file path or URL
        ]);
        return new ProductResource($product);
    }
    public function update(Request $request, ProductModel $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }
    public function destroy(ProductModel $product)
    {
        $product->delete();

        return response(null, 204);
    }
}
