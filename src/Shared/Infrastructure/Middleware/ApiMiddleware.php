<?php

namespace Src\Shared\Infrastructure\Middleware;

use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Exceptions\ApiAuthException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Closure;

final class ApiMiddleware
{
    use HttpCodesHelper;

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws ApiAuthException
     */
    public function handle(Request $request, Closure $next): mixed{
        if(empty($request->header('authorization'))){
            throw new ApiAuthException('Authorization header is empty', $this->badRequest());
        }

        if(env('API_KEY')!== $request->header('authorization')){
            throw new ApiAuthException('Authorization failed', $this->unauthorized());
        }

        return $next($request);
    }
}
