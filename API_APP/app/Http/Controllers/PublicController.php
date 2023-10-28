<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;
use App\Models\ProductModel;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function status(){
        return json_encode("API Status OK");
    }

    public function docs(){
        return view('doc');
    }
    public function products(ProductModel $product)
    {
        return json_encode("Wait");
    }
}
