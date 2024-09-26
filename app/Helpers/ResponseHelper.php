<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     * Send a success response.
     *
     * @param string $message
     * @param mixed $data
     * @return JsonResponse
     */
    public static function success(string $message,$code=200, $data = null ): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ]);
    }

    /**
     * Send an error response.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public static function error(string $message, int $code = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => $code,
        ], $code);
    }
}
