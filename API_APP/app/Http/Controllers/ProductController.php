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
            'product_pic' => $newFileName,
        ]);

        return new ProductResource($product);
    }

    public function show(ProductModel $product)
    {
        // tarnary operator: if not outhorize show the not_authorized function else show the product
        return $this->is_not_authorized($product) ? $this->is_not_authorized($product) : new ProductResource($product);
    }

    public function update(Request $request, ProductModel $product)
    {
        $this->is_not_authorized($product) ? $this->is_not_authorized($product) : $product->update($request->all());
        return new ProductResource($product);
    }

    public function destroy(ProductModel $product)
    {
        $this->is_not_authorized($product) ? $this->is_not_authorized($product) : $product->delete();

        return response(null, 204);
    }


    private function is_not_authorized($product)
    {
        if (Auth::user()->id != $product->seller_id) {
            return $this->error("", 'you are not authorized for this request', 403);
        }
    }

}
