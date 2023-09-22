<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function status(){
        return json_encode("API Status OK");
    }

    public function docs(){
        return view('doc');
    }
}
