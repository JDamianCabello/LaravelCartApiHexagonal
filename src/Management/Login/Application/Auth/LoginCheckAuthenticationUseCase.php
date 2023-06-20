<?php

namespace Src\Management\Login\Application\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObjects\LoginJWT;

final class LoginCheckAuthenticationUseCase
{
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract
    )
    {
    }

    public function __invoke(string $jwt)
    {
        return $this->loginAuthenticationContract->check(new LoginJWT($jwt));
    }

}
