<?php

namespace App\Traits;

trait ApiResponse
{
    public function responseSuccess($result, $code = 200)
    {
        return $this->json([
            'status_code' => $code,
            'data' => $result
        ]);
    }

    public function responseError($error, $code)
    {
        return $this->json([
            'status_code' => $code,
            'error_message' => $error
        ]);
    }

    public function json($result = [])
    {
        return response()->json($result);
    }
}
