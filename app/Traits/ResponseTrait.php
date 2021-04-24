<?php
namespace App\Traits;
use Illuminate\Http\Response;
trait ResponseTrait{
    public function success($message,$code = Response::HTTP_ACCEPTED){
        return response()->json([
            "data" => $message
        ],$code);
    }

    public function error($message,$code){
        return response()->json([
            "error" => $message,
            "code" => $code
        ],$code);
    }
}