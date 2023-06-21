<?php

namespace Src\API\Management\Login\Application\Auth;

use Src\API\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\API\Management\Login\Domain\ValueObjects\LoginJWT;

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
