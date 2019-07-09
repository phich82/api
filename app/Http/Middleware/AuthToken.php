<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Constant;
use Illuminate\Support\Facades\Crypt;

class AuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->verifyAuthToken($request->header(Constant::X_API_TOKEN))) {
            abort(401, lang('auth.x_api_token'));
        }
        return $next($request);
    }

    /**
     * Verify the auth token
     *
     * @param  string $token
     *
     * @return bool
     */
    private function verifyAuthToken($token)
    {
        $tokensAccepted = config('tokens.x-api-tokens-accepted');
        $tokensAccepted = is_string($tokensAccepted)
                            ? explode(',', $tokensAccepted)
                            : $tokensAccepted;
        return in_array($token, $tokensAccepted) && $this->verifyPayloadAuthToken();
    }

    /**
     * Verify payload in auth token string
     *
     * @return bool
     */
    private function verifyPayloadAuthToken()
    {
        return Crypt::decrypt(request()->header(Constant::X_API_TOKEN)) === request()->getHost();
    }
}
