<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MstCustomerService;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    /**
     * @var App\Services\MstCustomerService
     */
    private $mstCustomerService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(MstCustomerService $mstCustomerService)
    {
        /**
         * Note: when use guard from defined user, we should run commands:
         *       php artisan cache:clear
         *       php artisan config:cache
         */
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->middleware('jwt', ['except' => ['login', 'register']]);
        $this->mstCustomerService = $mstCustomerService;
    }

    /**
     * Register a new account
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        if ($this->mstCustomerService->existCustomer($request)) {
            return $this->responseError('User already existed.', 404);
        }
        $user = $this->mstCustomerService->create($request);
        return $this->responseSuccess(access_token_api_data(token_api($user)));
    }

    public function update(Request $request)
    {
        //
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return $this->responseSuccess(user_api());
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        if (!$token = token_api()) {
            return $this->responseError('Unauthorized', 401);
        }
        return $this->responseSuccess(access_token_api_data($token));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth_api()->logout();
        return $this->responseSuccess(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->responseSuccess(access_token_api_data(refresh_token_api()));
    }

    public function payload()
    {
        return $this->responseSuccess(auth_api()->payload());
    }
}
