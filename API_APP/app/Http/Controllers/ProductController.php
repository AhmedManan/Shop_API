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

        // Initialize the new file name as null
        $newFileName = null;

        // Handle product picture upload to the public folder
        if ($request->hasFile('product_pic')) {
            $file = $request->file('product_pic');

            // Generate a unique file name
            $extension = $file->getClientOriginalExtension();
            $randomDigits = rand(100000, 999999);
            $newFileName = 'pdt_' . $randomDigits . '.' . $extension;

            // Move the uploaded file to the public product_pics folder
            $file->move(public_path('uploads/product_pics'), $newFileName);
        }

        // Create the product with the new file name or null if no picture was uploaded
        $product = ProductModel::create([
            'seller_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category' => $validatedData['category'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
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
        if ($this->is_not_authorized($product)) {
            // Handle unauthorized access here (e.g., return an error response)
            // You can customize this based on your authorization logic.
        } else {
            // Delete the old product picture if it exists
            if ($product->product_pic) {
                $oldPath = public_path('uploads/product_pics/' . $product->product_pic);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $product->delete();

            return response(null, 204);
        }
    }


    private function is_not_authorized($product)
    {
        if (Auth::user()->id != $product->seller_id) {
            return $this->error("", 'you are not authorized for this request', 403);
        }
    }

    public function getProductPic($filename)
    {
        // Define the path to the public product_pics directory
        $path = public_path('uploads/product_pics/' . $filename);

        // Check if the file exists
        if (file_exists($path)) {
            // Return the image with the appropriate response headers
            return response()->file($path);
        }

        // If the file doesn't exist, return a 404 response
        return response('Image not found', 404);
    }
}
