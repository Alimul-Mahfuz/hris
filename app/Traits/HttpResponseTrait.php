<?php

namespace App\Traits;

trait HttpResponseTrait
{
    function httpResponse($status,$message,$data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }



}
