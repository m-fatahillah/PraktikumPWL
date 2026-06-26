<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string|null  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiSuccess($data, $message = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string|null  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiError($message = null, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}
