<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function ResponseSuccess($data, $message = '', $status = 200): JsonResponse
    {
        $data = [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($data, $status);
    }

    public function ResponseError($message = '', $status = 404): JsonResponse
    {
        $data = [
            'success' => true,
            'message' => $message,
        ];

        return response()->json($data, $status);
    }
}
