<?php

namespace App\Http\Middleware;

use Closure;

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
        $token = $request->header('X-API-TOKEN');
        $tokensAccepted = ['test-value'];
        if (!in_array($token, $tokensAccepted)) {
            abort(401, 'Auth Token Not Found.');
        }
        return $next($request);
    }
}
