<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\ValueObjects\LoginAutenticationParameters;
use Src\Management\Login\Domain\ValueObjects\LoginJWT;

interface LoginAuthenticationContract
{
    /**
     * @param LoginAutenticationParameters $loginAutenticationParameters
     * @return string
     */
    public function auth(LoginAutenticationParameters $loginAutenticationParameters): string;

    /**
     * @param LoginJWT $loginJWT
     * @return bool
     */
    public function check(LoginJWT $loginJWT): bool;
}
