<?php

namespace Src\API\Management\Login\Domain\Contracts;

use Src\API\Management\Login\Domain\Login;
use Src\API\Management\Login\Domain\ValueObjects\LoginAuthication;

interface LoginRepositoryContract
{
    /**
     * @param LoginAuthication $loginAuthication
     * @return Login
     */
    public function login(LoginAuthication $loginAuthication): Login;
}
