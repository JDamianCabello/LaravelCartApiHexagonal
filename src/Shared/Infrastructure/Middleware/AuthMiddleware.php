<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Management\Login\Application\Auth\LoginCheckAuthenticationUseCase;
use Src\Shared\Infrastructure\Exceptions\AuthException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class AuthMiddleware
{
    use HttpCodesHelper;

    public function __construct(private readonly LoginCheckAuthenticationUseCase $checkAuthenticationUseCase)
    {
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AuthException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (empty($request->header('authentication'))){
            throw new AuthException('Empty jwt auth', $this->badRequest());
        }

        $check = $this->checkAuthenticationUseCase->__invoke($request->header('authentication'));

        if(!$check){
            throw new AuthException('Invalid token or invalid user or expired token', $this->badRequest());
        }

        return $next($request);
    }
}
