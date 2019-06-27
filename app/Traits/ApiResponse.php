<?php

namespace App\Traits;

use App\Helpers\Constant;

trait ApiResponse
{
    /**
     * Response successfully
     *
     * @param  string|array|object $result
     * @param  int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($result, $code = 200)
    {
        return $this->json([
            Constant::STATUS_CODE_KEY_API => $code,
            Constant::RESULT_KEY_API      => $result
        ]);
    }

    /**
     * Response failed
     *
     * @param  string $error
     * @param  int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($error, $code)
    {
        return $this->json([
            Constant::STATUS_CODE_KEY_API   => $code,
            Constant::ERROR_MESSAGE_KEY_API => $error
        ]);
    }

    /**
     * Get JSON object
     *
     * @param  string|array|object $result
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function json($result = [])
    {
        return response()->json($result);
    }
}
