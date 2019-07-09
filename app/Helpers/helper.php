<?php
use App\Helpers\Constant;

if (!function_exists('lang')) {
    /**
     * Get language
     *
     * @param  string $key
     * @param  array $replace
     * @param  string $locale
     *
     * @return string
     */
    function lang($key = null, $replace = [], $locale = null)
    {
        $locale = $locale ?: request()->header(Constant::LANG_KEY_API, app()->getLocale());
        return trans($key, $replace, $locale);
    }
}

if (!function_exists('apiGuardKey')) {
    /**
     * Get key of Api Guard
     *
     * @return string
     */
    function apiGuardKey()
    {
        return Constant::API_GUARD_KEY ?? 'api';
    }
}

if (!function_exists('auth_api')) {
    /**
     * Get the available auth instance for only restful api
     *
     * @return \Illuminate\Contracts\Auth\Factory|
     *         \Illuminate\Contracts\Auth\Guard|
     *         \Illuminate\Contracts\Auth\StatefulGuard
     */
    function auth_api()
    {
        return auth(apiGuardKey());
    }
}

if (!function_exists('user_api')) {
    /**
     * Get api user logged in
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user_api()
    {
        return auth_api()->user();
    }
}

if (!function_exists('refresh_token_api')) {
    /**
     * Get the new token
     *
     * @return string
     */
    function refresh_token_api()
    {
        return auth_api()->refresh();
    }
}

if (!function_exists('access_token_api_data')) {
    /**
     * Get data for access token
     *
     * @param  string $token
     * @param  string $type
     * @param  bool $withExpire
     *
     * @return array
     */
    function access_token_api_data($token, $type = 'bearer', $withExpire = true)
    {
        $data = [
            'access_token' => $token,
            'token_type'   => $type,
        ];
        if ($withExpire === true) {
            $data['expires_in'] = auth_api()->factory()->getTTL() * 60;
        }
        return $data;
    }
}

if (!function_exists('token_api')) {
    /**
     * Get api token
     *
     * @param  array|object $credentials
     *
     * @return string
     */
    function token_api($credentials = [])
    {
        // get token after registeration successfully
        if (is_object($credentials)) {
            return auth_api()->login($credentials);
        }
        $credentials = empty($credentials) ? request(['email', 'password']) : $credentials;
        return auth_api()->attempt($credentials);
    }
}
