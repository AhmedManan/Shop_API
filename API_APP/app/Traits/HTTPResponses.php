<?php

namespace App\Traits;

trait HTTPResponses{
    protected function success($data, $message=null, $code=200){
        return response()->json([
            "status" => "Request succesful",
            "message" => $message,
            "data" => $data
        ], $code);
    }
    protected function error($data, $message=null, $code){
        return response()->json([
            "status" => "Request Failed",
            "message" => $message,
            "data" => $data
        ], $code);
    }
}