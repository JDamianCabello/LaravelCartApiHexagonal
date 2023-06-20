<?php

namespace Src\Management\Login\Application\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObjects\LoginAutenticationParameters;

final class LoginAutenticationUseCase
{
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract
    )
    {
    }

    public function __invoke(array $request): string
    {
        return $this->loginAuthenticationContract->auth(new LoginAutenticationParameters($request));
    }
}
